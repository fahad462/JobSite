@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Jobs</div>
                    <div class="card-body">
                        <div class="card-body">

                            <script>
                                function poster(e) {
                                    $id = e.value;
                                    $.post('{{route('apply')}}', {
                                            "_token": "{{ csrf_token() }}",
                                            'jid': $id
                                        }
                                    ).done(function (response) {

                                        if (response == "falied")
                                            window.location.href = '{{ route('home') }}'
                                        else {
                                            alert(response)
                                            location.reload();
                                        }
                                    }).fail(function () {
                                        alert("error");

                                    });
                                }
                            </script>

                            @foreach($jobs as $job)
                                <hr>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p id="t{{ __($job->id) }}">Job Title: {{ __($job->job_title)  }}</p>
                                        <p id="d{{ __($job->id) }}">Job
                                            Description: {{ __($job->job_description)  }}</p>
                                        <p id="s{{ __($job->id) }}">Salary: {{ __($job->salary)  }}</p>
                                        <p id="c{{ __($job->id) }}">Country: {{ __($job->country)  }}</p>
                                        <p id="l{{ __($job->id) }}">Location: {{ __($job->location)  }}</p>
                                        <button value="{{ __($job->id) }}" type="button" onclick="poster(this)">Apply
                                        </button>
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

<script src="jquery-3.4.1.min.js"></script>