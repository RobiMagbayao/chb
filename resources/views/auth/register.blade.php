@extends('layouts.navbarOnly')

@section('navbar')
<div class="container nav-margin">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 mb-5">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="login-header h2 text-center mt-2 mb-5">
                            {{ __('Sign up') }}
                        </div>

                        <div class="row mb-2">
                            <label for="name" class="col-md-4 col-form-label text-md-end visually-hidden">{{ __('Name') }}</label>

                            <div class="col-md-10 mx-auto">

                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input placeholder="Enter your username" aria-label="Enter your username" aria-describedby="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                  </div>

                                @error('name')
                                    <span class="text-danger mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-end visually-hidden">{{ __('Email Address') }}</label>

                            <div class="col-md-10 mx-auto">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                                    <input placeholder="Enter your email" aria-label="enter your email" aria-describedby="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                  </div>

                                @error('email')
                                    <span class="text-danger mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-end visually-hidden">{{ __('Password') }}</label>

                            <div class="col-md-10 mx-auto">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input placeholder="Enter your password" aria-label="Enter your password" aria-describedby="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                  </div>

                                @error('password')
                                    <span class="text-danger mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end visually-hidden">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10 mx-auto">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-person-fill-lock"></i></i></span>
                                    <input placeholder="Confirm password" aria-label="Confirm password" aria-describedby="password-confirm" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                  </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-10 mx-auto mt-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-10 mx-auto text-center mt-4">
                                <div>Already have an account? <a class="fw-bold" href="{{route('login')}}" style="text-decoration: none">Sign In</a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
