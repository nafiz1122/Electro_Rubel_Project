@extends('layouts.client_master')

@section('content')
<head>
    <!-- Login page stlylesheet -->
    <link rel="stylesheet" type="text/css" href="/client_assets/login_assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/client_assets/login_assets/css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
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
                    <form action="{{route('store.sign-up')}}" method="POST" id="quickForm" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        @csrf
                        <span class="login100-form-title">
                            Customers Sign Up
                        </span>
                        <div class="form-group">
                            <label for="username" class="text-info">Name</label><br>
                            <input type="text" name="name" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-info">Email</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-info">Phone</label><br>
                            <input type="number" name="phone" id="phone" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Confirm Password:</label><br>
                            <input type="text" name="cpass" id="cpassword" class="form-control">
                        </div>
                        <div class="container-login100-form-btn p-t-15">
                            <button class="login100-form-btn">
                                Sign Up
                            </button>
                        </div>

                        <div class="flex-col-c p-t-15  p-b-40">
                            <span class="txt1 p-b-9">
                                If you have an account?
                            </span>
                            <a href=" {{route('customers.login')}} " class="txt3">
                                Login here
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>




@endsection
