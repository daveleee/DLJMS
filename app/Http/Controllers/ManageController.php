<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\JobPost;                                // use JobPost model
use App\Requirement;                            // use Requirement model
use App\Candidate;                              // use Candidate model

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

    public function getAllRequirement($tblRequirements) {
        array_push($this->reqMajorArray, $tblRequirements->requirement_major);
        array_push($this->reqEduLevelArray, $tblRequirements->requirement_education_level);
        array_push($this->reqLocArray, $tblRequirements->requirement_location);
        array_push($this->reqWorkExpArray, $tblRequirements->requirement_work_experience);
        array_push($this->reqStatusArray, $tblRequirements->requirement_visa_status);
    }

    public function getCandidate($query, $jobpostIndex, $filterAll) {
        $query .= Candidate::allCandidate($jobpostIndex);
        $table_candidates = DB::select($query);

        if ($filterAll && $this->reqMajorArray) {
            $query = Candidate::filterByMajor($query, $this->reqMajorArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqEduLevelArray) {
            $query = Candidate::filterByEducationLevel($query, $this->reqEduLevelArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqLocArray) {
            $query = Candidate::filterByLocation($query, $this->reqLocArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqWorkExpArray) {
            $query = Candidate::filterByWorkExperience($query, $this->reqWorkExpArray);
            $table_candidates = DB::select($query);
        }
        if ($filterAll && $this->reqStatusArray) {
            $query = Candidate::filterByStatus($query, $this->reqStatusArray);
            $table_candidates = DB::select($query);
        }

        return $table_candidates;
    }

    public function index(Request $request) {
        // access the data sent from get request
        $jobpostIndex = $request->input('jobpost_idx');
        $filterAll = $request->input('filter_all');
        $query = "";

        // get table_jobposts
        $table_jobposts = JobPost::all();

        // get table_requirements
        $table_requirements = Requirement::where('requirement_jobpost_index', $jobpostIndex)->get();

        // get table_requirements for major, education level, location, work experience, visa status
        foreach ($table_requirements as $tblRequirements) {
            $this->getAllRequirement($tblRequirements);
        }

        // get table_candidates (all, filter)
        $table_candidates = $this->getCandidate($query, $jobpostIndex, $filterAll);

        return view('/management/manageCandidates', [
            'jobpostIndex' => $jobpostIndex,
            'table_jobposts' => $table_jobposts,
            'table_requirements' => $table_requirements,
            'table_candidates' => $table_candidates,
        ]);
    }
}
