@extends('layouts.client_master')
@section('content')
@include('layouts.slider')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										 <!-- product -->
                                         @foreach ($products  as $product)
                                         <div class="product">
                                             <div class="product-img">
                                                 <img width="300" height="300" src="public/Upload/Product_images/{{$product->image}}" alt="">
                                                 <div class="product-label">
                                                     {{-- <span class="sale">-30%</span>
                                                     <span class="new">NEW</span> --}}
                                                 </div>
                                             </div>
                                             <div class="product-body">
                                                 <p class="product-category">Category</p>
                                                 <h3 class="product-name"><a href="#"> {{$product->name}} </a></h3>
                                                 <h4 class="product-price">{{$product->price}} TK <del class="product-old-price">$990.00</del></h4>
                                                 {{-- <div class="product-rating">
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                 </div> --}}
                                                 <div class="product-btns">
                                                     <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                     <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                     <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                 </div>
                                             </div>
                                             <div class="add-to-cart">
                                                  <a href=" {{url('product_details/'.$product->slug)}} "><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                             </div>
                                         </div>
                                         @endforeach
                                         <!-- /product -->

										<!-- product -->

										<!-- /product -->

										<!-- product -->

										<!-- /product -->

										<!-- product -->

										<!-- /product -->

										<!-- product -->

										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							{{-- <div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
                                        @php
                                        $products = App\Models\Product::inRandomOrder()->get();

                                    @endphp
                                     <!-- product -->
                                     @foreach ($products  as $product)
                                     <div class="product">
                                         <div class="product-img">
                                             <img width="300" height="300" src="public/Upload/Product_images/{{$product->image}}" alt="">
                                             <div class="product-label">
                                                 {{-- <span class="sale">-30%</span>
                                                 <span class="new">NEW</span> --}}
                                             </div>
                                         </div>
                                         <div class="product-body">
                                             <p class="product-category">Category</p>
                                             <h3 class="product-name"><a href="#"> {{$product->name}} </a></h3>
                                             <h4 class="product-price">{{$product->price}} TK <del class="product-old-price">$990.00</del></h4>
                                             {{-- <div class="product-rating">
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                             </div> --}}
                                             <div class="product-btns">
                                                 <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                 <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                 <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                             </div>
                                         </div>
                                         <div class="add-to-cart">
                                              <a href=" {{url('product_details/'.$product->slug)}} "><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                         </div>
                                     </div>
                                     @endforeach
                                    <!-- /product -->


									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				        <!-- row -->
                        <div class="row">
                            <div class="col-md-4 col-xs-6">
                                <div class="section-title">
                                    <h4 class="title">Top selling</h4>
                                    <div class="section-nav">
                                        <div id="slick-nav-3" class="products-slick-nav"></div>
                                    </div>
                                </div>

                                <div style="outline: none" class="products-widget-slick" data-nav="#slick-nav-3">
                                    <div>
                                        <!-- product -->
                                        @php
                                            $products1 = App\Models\Product::all()->random(3);
                                            $products2 = App\Models\Product::all()->random(3);
                                            $products3 = App\Models\Product::all()->random(3);
                                            $products4 = App\Models\Product::all()->random(3);
                                            $products5 = App\Models\Product::all()->random(3);
                                            $products6 = App\Models\Product::all()->random(3);
                                        @endphp
                                     <!-- product -->
                                        <!-- product widget -->
                                        @foreach ($products1 as $product)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="public/Upload/Product_images/{{$product->image}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$product->category->category_name}}</p>
                                                <h3 class="product-name"><a href="{{url('product_details/'.$product->slug)}}">{{$product->name}}</a></h3>
                                                <h4 class="product-price">{{$product->price}} Taka</h4>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- /product widget -->
                                    </div>
                                    <div>
                                        <!-- product widget -->
                                        @foreach ($products2 as $product)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="public/Upload/Product_images/{{$product->image}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$product->category->category_name}}</p>
                                                <h3 class="product-name"><a href="{{url('product_details/'.$product->slug)}}">{{$product->name}}</a></h3>
                                                <h4 class="product-price">{{$product->price}} Taka</h4>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- /product widget -->

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xs-6">
                                <div class="section-title">
                                    <h4 class="title">Top selling</h4>
                                    <div class="section-nav">
                                        <div id="slick-nav-4" class="products-slick-nav"></div>
                                    </div>
                                </div>

                                <div class="products-widget-slick" data-nav="#slick-nav-4">
                                    <div>
                                        <!-- product widget -->
                                        @foreach ($products3 as $product)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="public/Upload/Product_images/{{$product->image}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$product->category->category_name}}</p>
                                                <h3 class="product-name"><a href="{{url('product_details/'.$product->slug)}}">{{$product->name}}</a></h3>
                                                <h4 class="product-price">{{$product->price}} Taka</h4>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- /product widget -->
                                    </div>

                                    <div>
                                        <!-- product widget -->
                                        @foreach ($products4 as $product)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="public/Upload/Product_images/{{$product->image}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$product->category->category_name}}</p>
                                                <h3 class="product-name"><a href="{{url('product_details/'.$product->slug)}}">{{$product->name}}</a></h3>
                                                <h4 class="product-price">{{$product->price}} Taka</h4>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- /product widget -->
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix visible-sm visible-xs"></div>

                            <div class="col-md-4 col-xs-6">
                                <div class="section-title">
                                    <h4 class="title">Top selling</h4>
                                    <div class="section-nav">
                                        <div id="slick-nav-5" class="products-slick-nav"></div>
                                    </div>
                                </div>

                                <div class="products-widget-slick" data-nav="#slick-nav-5">
                                    <div>
                                        <!-- product widget -->
                                        @foreach ($products5 as $product)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="public/Upload/Product_images/{{$product->image}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$product->category->category_name}}</p>
                                                <h3 class="product-name"><a href="{{url('product_details/'.$product->slug)}}">{{$product->name}}</a></h3>
                                                <h4 class="product-price">{{$product->price}} Taka</h4>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- /product widget -->


                                    </div>

                                    <div>
                                        <!-- product widget -->
                                        @foreach ($products6 as $product)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="public/Upload/Product_images/{{$product->image}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$product->category->category_name}}</p>
                                                <h3 class="product-name"><a href="{{url('product_details/'.$product->slug)}}">{{$product->name}}</a></h3>
                                                <h4 class="product-price">{{$product->price}} Taka</h4>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- /product widget -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
