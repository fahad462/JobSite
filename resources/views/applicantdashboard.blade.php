@extends('layouts.app')

@section('content')
    @isset($alert)
        <script>
            alert('Updated Successfully');
        </script>
    @endisset
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Applicants Dashboard</div>
                    <div class="card-header"><a href="{{ route('jobs')  }}">See All Jobs</a></div>

                    <div class="card-body">
                        <hr>
                        <div class="container bootstrap snippet">
                            <div class="row">
                                <div class="col-sm-10"><h1>{{ __($name) }}</h1></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <hr>
                                            <form enctype="multipart/form-data" class="form"
                                                  action="{{ route('updateprofile') }}" method="post"
                                                  id="registrationForm">
                                                @csrf
                                                <div class="form-group">
                                                    @if($url == "")
                                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                             class="avatar img-circle img-thumbnail" alt="avatar">
                                                    @endif
                                                    @if($url != "")
                                                        <img src="{{ __(asset($url))  }}"
                                                             class="avatar img-circle img-thumbnail" alt="avatar">
                                                    @endif
                                                    <h6>Upload a different photo...</h6>
                                                    <input accept=".jpeg,.jpg, .png" name="pic" type="file"
                                                           class="text-center center-block file-upload">
                                                </div>
                                                <div class="form-group">

                                                    <div class="col-xs-6">
                                                        <label><h4>Email : {{ __($email) }}</h4></label>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="col-xs-6">
                                                        <label><h4>Upload a new Resume(PDF/DOCX)</h4></label>
                                                        <input accept=".docx,.pdf" name="resume" required type="file"
                                                               class="text-center center-block file-upload">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <div class="col-xs-6">
                                                        <label><h4>Add Skils(Write Comma Seperately)</h4></label>
                                                        <input name="skill" type="text"
                                                               class="form-control">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <br>
                                                        <button class="btn btn-lg btn-success" type="submit"><i
                                                                    class="glyphicon glyphicon-ok-sign"></i> Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <hr>

                                        </div><!--/tab-pane-->


                                    </div><!--/tab-pane-->
                                </div><!--/tab-content-->

                            </div><!--/col-9-->
                        </div><!--/row-->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
