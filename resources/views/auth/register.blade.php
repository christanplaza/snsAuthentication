@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mt-4 text-center">
                            <h1 class="title">Sign Up with Social Media</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-lg-6">
                            <a href="{{ url('/auth/redirect/facebook/') }}" class="btn btn-block facebook-blue text-white">Facebook</a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-lg-6">
                            <a href="{{ url('/auth/redirect/twitter/') }}" class="btn btn-block twitter-blue text-white">Twitter</a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-lg-6">
                            <a href="{{ url('/auth/redirect/google/') }}" class="btn btn-block google-red text-white">Google</a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-5">
                            <hr>
                        </div>
                        <div class="col-lg-2 text-center">
                            <h3>OR</h3>
                        </div>
                        <div class="col-lg-5">
                            <hr>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mt-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>This email already exists!</strong> This email could already be registered through the
                                    following providers:
                                    <ul>
                                        <li>Facebook</li>
                                        <li>Google</li>
                                        <li>Twitter</li>
                                    </ul>
                                    Try logging in through these providers or use a different email.
                                </span>
                                @enderror
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
