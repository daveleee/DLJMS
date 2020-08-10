<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    // define table
    protected $table = 'table_candidates';

    public static function allCandidate($jobpostIndex) {
        $query = "SELECT *
                FROM (
                      SELECT candidate_user_index
                      FROM table_candidates
                      WHERE candidate_jobpost_index = '$jobpostIndex'
                     ) t1
                JOIN table_users t2
                ON t1.candidate_user_index = t2.user_index";
        return $query;
    }

    public static function filterByMajor($query, $reqMajorArray) {
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

    public static function filterByEducationLevel($query, $reqEduLvlArray) {
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

    public static function filterByLocation($query, $reqLocArray) {
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

    public static function filterByWorkExperience($query, $reqWorkExpArray) {
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

    public static function filterByStatus($query, $reqStatusArray) {
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
}
