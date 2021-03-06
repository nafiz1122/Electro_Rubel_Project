<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="/client_assets/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/client_assets/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="/client_assets/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="/client_assets/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="/client_assets/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="/client_assets/css/style.css"/>
		<!-- Toastr stlylesheet -->
		<link type="text/css" rel="stylesheet" href="/client_assets/css/toastr.min.css"/>


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        #loader{
            position: fixed;
            width: 100%;
            height: 100vh;
            background:#fff url('client_assets/img/loader.gif') no-repeat center;
            z-index: 99999;
        }
    </style>
    </head>
	<body onload="myfunction()">
        <!-----Preloader------->
        <div id="loader">

        </div>
        <!-----Preloader------->

		<!-- HEADER -->
		@include('layouts.header')
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href=" {{route('index')}} ">Home</a></li>
                        <li><a href="{{route('product_store')}}">STORE</a></li>
                        @php
                            $categories = App\Models\Product::select('category_id')->groupBy('category_id')->get();
                        @endphp
						@foreach ($categories as $category)
                        <li><a href=" {{route('product_by_category',$category->category_id)}} ">{{$category->category->name}}</a></li>
                        @endforeach

					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		{{-- slidesToScroll --}}
		<!-- /SECTION -->

        @yield('content')

		<!-- NEWSLETTER -->
		{{-- <div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div> --}}
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>We provide all kinds of computer & Laptop accessories sales, service. we have CC Camera sales and installation.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Mirpur Circle-10,Shah- Ali Plaza 1216 Dhaka.</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>01617-831579</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>0197-2040999</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>winnertechnolgy2017<br>@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a style="text-decoration: none;color:#007bff!important" href="https://konikadesignsbd.com" target="_blank">Konika designs bd</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
        <script src="/client_assets/js/jquery.min.js"></script>
		<script src="/client_assets/js/bootstrap.min.js"></script>
        <script src="/client_assets/js/slick.min.js"></script>

          <!-- jquery-validation -->
        <script src="/client_assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="/client_assets/plugins/jquery-validation/additional-methods.min.js"></script>

		<script src="/client_assets/js/nouislider.min.js"></script>
		<script src="/client_assets/js/jquery.zoom.min.js"></script>
		<script src="/client_assets/js/toastr.min.js"></script>
        <script src="/client_assets/js/main.js"></script>

        <!----preloader---->
        <script>
            var loader =document.getElementById("loader");

            function myfunction(){
                loader.style.display ="none";
                loader.style.transition =".5s";
            }
        </script>
        <!----preloader---->
		<!-- //slick js -->
		{{-- <script>
			$('.slick_slider').slick({
				infinite: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				autoplay: true,
  				autoplaySpeed: 3000,
			});
        </script> --}}
        <script>
            $('.slick_slider').slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 4,
                        responsive: [
                            {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                            },
                            {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 2
                            }
                            },
                            {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                        });
        </script>
         {{-- toastr script --}}
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

    </script>
    {{-- jquery validation --}}
    <script>
            $.validator.setDefaults({
                errorClass:'help-block',
                highlight:function(element){
                    $(element).closest('.form-control').addClass('has-error');
                },
                unhighlight:function(element){

                $(element)
                    .closest('.form-control')
                    .addClass('has-valid');
                }

            });

        $(function() {
        $("#quickForm").validate({
            // Specify validation rules
            rules: {

                name: "required",
                phone: "required",
                email: "required",
                city: "required",
                address: "required",
            lastname: "required",
            phone:{
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            cpass:{
                required:true,
                equalTo:"#password"
            },
            code:{
                required:true,
            }
            },
            // Specify validation error messages
            messages: {
                phone: "Please enter your Phone",
            lastname: "Please enter your lastname",
            code: "Please enter your validation Code",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            name: "Please enter your name"
            },
            cpass:{
                equalTo:"Password not matched"
            },
            submitHandler: function(form) {
            form.submit();
            }
        });
        });
    </script>
	</body>
</html>
