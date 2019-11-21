@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Jobs</div>
                    <div class="card-body">
                        <div class="card-body">
                            @foreach($appli as $user)
                                <hr>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p>Applicants name: {{ __($user->lastname) }}</p>
                                        <p>Applicants email: {{ __($user->email) }}</p>
                                        <p>Applicants skills: {{ __($user->skills) }}</p>
                                        <p>Applied Position: {{ __($user->job_title) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection