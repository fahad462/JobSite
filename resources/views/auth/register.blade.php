@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control" name="lname"
                                           value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                                <div class="col-md-6">
                                    <input id="bname" type="text" class="form-control" name="bname"
                                           value="{{ old('bname') }}" required autocomplete="bname" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="se"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Applicant?') }}</label>

                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="selection" name="selection" type="checkbox" class="form-check-input"
                                               value="Applicant">Applicant
                                        <input id="selection1" name="selection1" type="checkbox"
                                               class="form-check-input" value="Company">Company
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
    $(document).ready(function () {
        $('#selection').click(function () {
            var temp = document.getElementById('bname');
            temp.value = ""
            temp.disabled = true
            document.getElementById('selection1').checked = false;
        });
        $('#selection1').click(function () {
            var temp = document.getElementById('bname');
            temp.disabled = false
            document.getElementById('selection').checked = false;
        });
    });
</script>