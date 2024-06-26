@extends('layouts.app')
@section('title', 'User login')
@section('content')
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#" class="active">login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- user-login-area-start -->
<div class="user-login-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-title text-center mb-10">
                    <h2>Login</h2>
                    
                </div>
            </div>
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                @if(Session::has('flash_message_error'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{!! session('flash_message_error') !!}</strong>
                  </div>
                @endif
                @if(Session::has('flash_message_success'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{!! session('flash_message_success') !!}</strong>
                  </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-form">
                        <div class="single-login">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="input-lg form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="single-login">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <span class="text-danger">*</span></label>
                            
                            <input id="password" type="password" class="input-lg form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="single-login single-login-2">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-flat btn-block btn-lg">
                                    {{ __('Login') }}
                                </button> 
                            </div>
                            
                            <input class="" type="checkbox" name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}><span class="" for="remember">
                                {{ __('Remember Me') }}
                            </span>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- user-login-area-end -->
@endsection