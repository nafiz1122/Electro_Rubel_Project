@extends('layouts.client_master')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li class="active">(227,490 Results)</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        @foreach ($categories as $category)
                        <div class="input-checkbox">
                            <label for="category-1">
                                <span></span>
                                    <a href=" {{route('product_by_category',$category->category_id)}} ">{{$category->category->name}}</a>
                                <small>
                                (@php
                                    $category = App\Models\Product::where('category_id',$category->category_id)->get();
                                    $Count = count($category);
                                    echo $Count;
                                @endphp)
                                    </small>
                            </label>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- /aside Widget -->

                {{-- <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget --> --}}

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        @foreach ($brands as $brand)
                        <div class="input-checkbox">
                            <label for="category-1">
                                <span></span>
                                    <a href=" {{route('product_by_brand',$brand->brand_id)}} ">{{$brand->brand->name}}</a>
                                <small>
                                (@php
                                    $brand = App\Models\Product::where('brand_id',$brand->brand_id)->get();
                                    $Count = count($brand);
                                    echo $Count;
                                @endphp)
                                    </small>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <!-- product -->
                    @php
                        $productss = App\Models\Product::all()->random(5);
                    @endphp
                    <!-- product -->
                    @foreach ($productss as $product)
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="/public/Upload/Product_images/{{$product->image}}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category"> {{$product['category']['name']}} </p>
                            <h3 class="product-name"><a href="#"> {{$product->name}} </a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    @foreach ($products  as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img width="300" height="300"  src="/public/Upload/Product_images/{{$product->image}}" alt="">
                                <div class="product-label">
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            {{-- <del class="product-old-price">$990.00</del> --}}
                            <div class="product-body">
                                <p class="product-category">{{$product->category->category_name}}</p>
                                <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                <h4 class="product-price">{{$product->price}} TK </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">

                               <a href="{{url('product_details/'.$product->slug)}}"> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->

                    <div class="clearfix visible-sm visible-xs"></div>

                    <!-- /product -->
                </div>

                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter">
                    <span class="store-qty">Showing 20-100 products</span>
                    <div class="pagination pull-right">

                    </div>

                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


@endsection
