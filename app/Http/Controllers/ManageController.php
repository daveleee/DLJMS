<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\JobPost;                                // use JobPost model
use App\Requirement;                            // use Requirement model

class ManageController extends Controller
{
    // requirements list
    private $reqMajorArray;
    private $reqEduLevelArray;
    private $reqLocArray;
    private $reqWorkExpArray;
    private $reqStatusArray;

    public function __construct() {
        $this->reqMajorArray = [];
        $this->reqEduLevelArray = [];
        $this->reqLocArray = [];
        $this->reqWorkExpArray = [];
        $this->reqStatusArray = [];
    }

    public function filterMajor($query, $reqMajorArray) {
        $query .= " AND (";
        for ($i=0; $i<sizeof($reqMajorArray); $i++) {
            if ($i == sizeof($reqMajorArray)-1) {
                $query .= " t2.user_major = '$reqMajorArray[$i]' )";
            }
            else {
                $query .= " t2.user_major = '$reqMajorArray[$i]' OR ";
            }
        }
        return $query;
    }

    public function filterEducationLevel($query, $reqEduLvlArray) {
        $query .= " AND (";
        for ($i=0; $i<sizeof($reqEduLvlArray); $i++) {
            if ($i == sizeof($reqEduLvlArray)-1) {
                $query .= " t2.user_education_level = '$reqEduLvlArray[$i]' )";
            }
            else {
                $query .= " t2.user_education_level = '$reqEduLvlArray[$i]' OR ";
            }
        }
        return $query;
    }

    public function filterLocation($query, $reqLocArray) {
        $query .= " AND (";
        for ($i=0; $i<sizeof($reqLocArray); $i++) {
            if ($i == sizeof($reqLocArray)-1) {
                $query .= " t2.user_location = '$reqLocArray[$i]' )";
            }
            else {
                $query .= " t2.user_location = '$reqLocArray[$i]' OR ";
            }
        }
        return $query;
    }

    public function filterWorkExperience($query, $reqWorkExpArray) {
        $query .= " AND (";
        for ($i=0; $i<sizeof($reqWorkExpArray); $i++) {
            if ($i == sizeof($reqWorkExpArray)-1) {
                $query .= " t2.user_work_experience = '$reqWorkExpArray[$i]' )";
            }
            else {
                $query .= " t2.user_work_experience = '$reqWorkExpArray[$i]' OR ";
            }
        }
        return $query;
    }

    public function filterStatus($query, $reqStatusArray) {
        $query .= " AND (";
        for ($i=0; $i<sizeof($reqStatusArray); $i++) {
            if ($i == sizeof($reqStatusArray)-1) {
                $query .= " t2.user_visa_status = '$reqStatusArray[$i]' )";
            }
            else {
                $query .= " t2.user_visa_status = '$reqStatusArray[$i]' OR ";
            }
        }
        return $query;
    }

    public function getAllRequirement($tblRequirements) {
        array_push($this->reqMajorArray, $tblRequirements->requirement_major);
        array_push($this->reqEduLevelArray, $tblRequirements->requirement_education_level);
        array_push($this->reqLocArray, $tblRequirements->requirement_location);
        array_push($this->reqWorkExpArray, $tblRequirements->requirement_work_experience);
        array_push($this->reqStatusArray, $tblRequirements->requirement_visa_status);
    }

//    public function candidatesList($test = null) {
//        return view('/management/manageCandidates', [
//            'test' => $test
//        ]);
//    }

    public function index(Request $request) {
        // access the data sent from get request
        $jobpostIndex = $request->input('jobpost_idx');
        $filterAll = $request->input('filter_all');

        // table_jobposts
        $table_jobposts = JobPost::all();
//        $table_jobposts = DB::table('table_jobposts')->get();

        // table_requirements
        $table_requirements = Requirement::where('requirement_jobpost_index', $jobpostIndex)->get();
//        $table_requirements = DB::table('table_requirements')
//                                ->where('requirement_jobpost_index', $jobpostIndex)
//                                ->get();

        // table_requirements for major, education level, location, work experience, visa status
        foreach ($table_requirements as $tblRequirements) {
            $this->getAllRequirement($tblRequirements);
        }

        // table_candidates (basic)
        $query = "";
        $query .= "SELECT *
                    FROM (
                        SELECT candidate_user_index
                        FROM table_candidates
                        WHERE candidate_jobpost_index = '$jobpostIndex'
                        ) t1
                    JOIN table_users t2
                    ON t1.candidate_user_index = t2.user_index
                   ";
        $table_candidates = DB::select($query);

        // Filter = major, education level, location, work experience, visa status
        if ($filterAll && $this->reqMajorArray) {
            $query = $this->filterMajor($query, $this->reqMajorArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqEduLevelArray) {
            $query = $this->filterEducationLevel($query, $this->reqEduLevelArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqLocArray) {
            $query = $this->filterLocation($query, $this->reqLocArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqWorkExpArray) {
            $query = $this->filterWorkExperience($query, $this->reqWorkExpArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqStatusArray) {
            $query = $this->filterStatus($query, $this->reqStatusArray);
            $table_candidates = DB::select($query);
        }

        return view('/management/manageCandidates', [
            'table_jobposts' => $table_jobposts,
            'jobpostIndex' => $jobpostIndex,
            'table_candidates' => $table_candidates,
            'table_requirements' => $table_requirements
        ]);
    }
}
