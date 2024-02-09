@extends('layouts.navbarOnly')

@section('navbar')
<div class="container nav-margin">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 mb-5">
            <div class="card login-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="login-header h2 text-center mt-2 mb-5">
                            {{ __('Welcome back') }}
                        </div>
                        <div class="row mb-3">

                            <label for="email" class="col-md-4 col-form-label text-md-end visually-hidden">{{ __('Email Address') }}</label>

                            <div class="col-md-10 mx-auto">
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                                    <input placeholder="Enter your email" aria-label="enter your email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="text-danger mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="password" class="col-md-4 col-form-label text-md-end visually-hidden">{{ __('Password') }}</label>

                            <div class="col-md-10 mx-auto">
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input placeholder="Enter your password" aria-label="Enter your password" aria-describedby="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>

                                @error('password')
                                    <span class="text-danger mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-10 mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-10 mx-auto mt-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Sign In') }}
                                </button>

                                <!--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif-->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-10 mx-auto text-center mt-4">
                                <div>Don't have an account? <a class="fw-bold" href="{{route('register')}}" style="text-decoration: none">Sign Up</a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection