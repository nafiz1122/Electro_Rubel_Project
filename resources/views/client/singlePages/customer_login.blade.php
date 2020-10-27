@extends('layouts.client_master')

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
                    <form id="quickForm" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        <span class="login100-form-title">
                            Customers Sign In
                        </span>
                        <!-- --------error message------------ -->
                        @if(Session::has('message'))
                            <p class="alert alert-danger mt-2">{{ Session::get('message') }}</p>
                        @endif
                        <!-- --------error message------------ -->
                        <div class="form-group" data-validate="Please enter username">
                            <input class="form-control" type="text" name="email" placeholder="Username">
                        </div>

                        <div class="form-group" data-validate = "Please enter password">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="container-login100-form-btn p-t-15">
                            <button class="login100-form-btn">
                                Sign in
                            </button>
                        </div>

                        <div class="flex-col-c p-t-15  p-b-40">
                            <span class="txt1 p-b-9">
                                Don’t have an account?
                            </span>

                            <a href=" {{route('customer.sign-up')}} " class="txt3">
                                Sign up now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>





@endsection
