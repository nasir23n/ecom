@extends('frontend.layouts.app')

@section('content')
<section class="main">
    <form action="{{ route('register') }}" class="login_wrap" method="POST">
        @csrf
        <div class="panel login_panel">
            <div class="head">
                <h2>Register</h2>
            </div>
            <div class="body">
                <div class="form_group">
                    <label for="name">
                        Name
                    </label>
                    <input type="text" id="name" name="name" class="form_control @error('name') invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="invalid_message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" id="email" name="email" class="form_control @error('email') invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid_message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" id="password" name="password" class="form_control @error('password') invalid @enderror" placeholder="*****" required>
                    @error('password')
                        <span class="invalid_message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form_group">
                    <label for="confirm_password">
                        Confirm Password
                    </label>
                    <input type="password" id="confirm_password" name="password_confirmation" class="form_control @error('password_confirmation') invalid @enderror" placeholder="*****" required>
                </div>
                <div class="form_group">
                    <label class="block_checkbox">
                        <input class="checkbox x3 success" name="remember_me" type="checkbox">
                        <span>Remember Me</span>
                    </label>
                    <a href="{{ route('login') }}" style="float: right;">Alrady an account</a>
                </div>
                <div class="form_group">
                    <button type="submit" class="nl primary">Login</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
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
@endsection --}}
