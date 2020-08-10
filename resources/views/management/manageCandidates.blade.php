@if (isset($_GET["jobpost_idx"]))
    @php
        $jobpostIdx=$_GET["jobpost_idx"];
    @endphp
@endif
@if (isset($_GET["filter_all"]))
    @php
        $filterAll=$_GET["filter_all"];
    @endphp
@endif

@extends('layout')

@section('title')
    Management System to manage candidates
@endsection

@section('body')
    <!-- Page Content -->
    <div>
        <div class="row">
            <!-- Section 1 -->
            <div class="col-3">
                <h2 id="jobListTitle">Job List</h2>
                <div id="section1" class="list-group list-group-flush overflow-auto border-right">
                    @foreach($table_jobposts as $table_jobposts)
                        <a href="/management/manageCandidates?jobpost_idx={{ $table_jobposts->jobpost_index }}" class="list-group-item list-group-item-action">
                            <span class="badge badge-primary"> {{ $table_jobposts->jobpost_type }} </span>
                            <h5 id="jobpostPosition"> {{ $table_jobposts->jobpost_position }} </h5>
                            <p id="jobpostCompany"> {{ $table_jobposts->jobpost_company }} </p>
                            <span class="badge badge-light">{{ $table_jobposts->jobpost_location }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- End Section 1 -->

            <!-- Section 2 -->
            <div id="section2" class="col-9 overflow-auto border-right">
                <!-- Section 2 - Job Requirement -->
                <h2 id="requirementTitle">Requirement</h2>
                <div>
                    <p id="requirement1"> Major: </p>
                    @foreach($table_requirements as $tblReqMajor)
                        @if(!isset($tblReqMajor->requirement_major))
                            @break
                        @endif
                        {{ $tblReqMajor->requirement_major }} /
                    @endforeach
                    <br>
                    <p id="requirement2"> Education Level: </p>
                    @foreach($table_requirements as $tblReqEduLvl)
                            @if(!isset($tblReqEduLvl->requirement_education_level))
                                @break
                            @endif
                            {{ $tblReqEduLvl->requirement_education_level }} /
                        @endforeach
                    <br>
                    <p id="requirement3"> Location: </p>
                    @foreach($table_requirements as $tblReqLoc)
                        @if(!isset($tblReqLoc->requirement_location))
                            @break
                        @endif
                        {{ $tblReqLoc->requirement_location }} /
                    @endforeach
                    <br>
                    <p id="requirement4"> Work Experience: </p>
                    @foreach($table_requirements as $tblReqWorkExp)
                            @if(!isset($tblReqWorkExp->requirement_work_experience))
                                @break
                            @endif
                            {{ $tblReqWorkExp->requirement_work_experience }} /
                        @endforeach
                    <br>
                    <p id="requirement5"> Status: </p>
                    @foreach($table_requirements as $tblReqStatus)
                        @if(!isset($tblReqStatus->requirement_visa_status))
                            @break
                        @endif
                        {{ $tblReqStatus->requirement_visa_status }} /
                    @endforeach
                </div>

                <h2 id="filterTitle">Filter</h2>
                <div>
                    <p>Filter for all students who satisfied with all requirements</p>
                    @if(isset($jobpostIdx))
                        <a href="/management/manageCandidates?jobpost_idx={{$jobpostIdx}}&filter_all=true"
                           class="btn btn-primary btn-lg" role="button">
                            Filter All
                        </a>
                    @endif
                </div>
                <br>

                <!-- Section 2 - Candidate List -->
                <h2>Candidate List</h2>
                <table class="table table-striped">
                    <tr id="candidateTable1">
                        <th>Index</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>School</th>
                        <th>Major</th>
                        <th>Education Level</th>
                        <th>Email Address</th>
                        <th>Location</th>
                        <th>Work Experience</th>
                        <th>Visa Status</th>
                    </tr>
                    @foreach($table_candidates as $table_candidates)
                        <tr id="candidateTable2">
                            <td>{{ $table_candidates->user_index }}</td>
                            <td>{{ $table_candidates->user_name }}</td>
                            <td>{{ $table_candidates->user_gender }}</td>
                            <td>{{ $table_candidates->user_birthday }}</td>
                            <td>{{ $table_candidates->user_school }}</td>
                            <td>{{ $table_candidates->user_major }}</td>
                            <td>{{ $table_candidates->user_education_level }}</td>
                            <td>{{ $table_candidates->user_email_address }}</td>
                            <td>{{ $table_candidates->user_location }}</td>
                            <td>{{ $table_candidates->user_work_experience }}</td>
                            <td>{{ $table_candidates->user_visa_status }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- End Section 2 -->
        </div>
    </div>
    <!-- End Page Content -->
@endsection
