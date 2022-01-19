@extends('frontend.layouts.app')

@section('content')
<section class="main">
    <form action="{{ route('login') }}" class="login_wrap" method="POST">
        @csrf
        <div class="panel login_panel">
            <div class="head">
                <h2>Login</h2>
            </div>
            <div class="body">
                <div class="form_group">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" id="email" name="email" class="form_control @error('email') invalid @enderror" placeholder="+8801700000000" value="{{ old('email') }}">
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
                    <input type="password" id="password" name="password" class="form_control" placeholder="*****">
                </div>
                <div class="form_group">
                    <label class="block_checkbox">
                        <input class="checkbox x3 success" name="remember_me" type="checkbox">
                        <span>Remember Me</span>
                    </label>
                    <a href="{{ route('register') }}" style="float: right;">Create an account</a>
                </div>
                <div class="form_group">
                    <button type="submit" class="nl primary">Login</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection