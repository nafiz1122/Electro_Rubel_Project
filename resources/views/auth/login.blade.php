@extends('layouts.app')

@section('content')
<head>
    <!-- Login page stlylesheet -->
    <link rel="stylesheet" type="text/css" href="/client_assets/login_assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/client_assets/login_assets/css/main.css">
</head>
<style>
    .has-error{
        border: 1px solid red;

    }
    .help-block{
        color: red;
        font-weight: 350;
    }
    .has-valid{
        border: 1px solid green;

    }
</style>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form  method="POST" action="{{ route('login') }}"  id="quickForm" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                @csrf
                <span class="login100-form-title">
                     Sign In
                </span>
                <!-- --------error message------------ -->
                @if(Session::has('message'))
                    <p class="alert alert-danger mt-2">{{ Session::get('message') }}</p>
                @endif
                <!-- --------error message------------ -->
                <div class="form-group" data-validate="Please enter username">
                    <input id="email" class="form-control  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <font style="position: absolute;font-size:13px;color:red" > {{$message}} </font>
                    @enderror
                </div>

                <div class="form-group mt-2" data-validate = "Please enter password">
                    <input class="form-control  @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    @error('password')
                    <font style="position: absolute;font-size:13px;color:red" > {{$message}} </font>
                    @enderror
                </div>
                <div class="container-login100-form-btn p-t-15">
                    <button type="submit" class="login100-form-btn">
                        Sign in
                    </button>
                </div>

                <div class="flex-col-c p-t-15  p-b-40">
                    <span class="txt1 p-b-9">
                        Don’t have an account?
                    </span>
                    <a href=" {{route('register')}} " class="txt3">
                        Sign up now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
