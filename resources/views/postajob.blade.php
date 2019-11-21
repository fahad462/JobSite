@extends('layouts.app')

@section('content')

    @if($alert != "")

        <script>
            alert("Job Created Successfuly");
        </script>

    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Post a Job') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('postajob') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="{{ old('title') }}" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="des"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Job Description') }}</label>

                                <div class="col-md-6">
                                    <input id="des" type="text" class="form-control" name="des" value="{{ old('des') }}"
                                           required autocomplete="des" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salary"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="number" min="0" class="form-control" name="salary"
                                           value="{{ old('salary') }}" required autocomplete="salary" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location"
                                           value="{{ old('location') }}" required autocomplete="location">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="country" class="form-control" name="country" required
                                           autocomplete="country">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
</script>