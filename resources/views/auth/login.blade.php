@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('message'))
        <div class="col-md-8">
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
                <b>{{ session('email') }}</b> with {{ Str::title(session('provider')) }}
            </div>
        </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mt-4 text-center">
                            <h1 class="title">Social Media Login</h1>
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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mt-4">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
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
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
