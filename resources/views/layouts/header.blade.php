<style>
    #productStatus{
        border-bottom: 1px solid #ddd;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/

        position:absolute;
        background:white;
        border-bottom:1px solid black;
        max-height: 220px;
        max-width: 450px;
        overflow: hidden;
    }
    #productStatus ul li{
        padding: 4px 0;
        margin: 0;
    }
    #productStatus ul li:hover{
        background-color: #e9e9e9;
    }
</style>
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> 01617-831579</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> winnertechnolgy2017@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>
                    Mirpur Circle-10,Shah- Ali Plaza 1216 Dhaka.
                    </a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> BDT</a></li>
                {{-- <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li> --}}
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            {{-- <img src="/client_assets/img/logo.png" alt=""> --}}
                            <h2 style="color: #fff;font-size:22px;padding: 5px;">Winner Technology<span style="color: #007bff;font-size:48px">.</span></h2>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{route('product.search')}}" method="POST">
                            @csrf
                            <select class="input-select">
                                <option value="0">All Categories</option>
                            </select>
                            <input class="input" id="slug" name="slug" placeholder="Search here" autocomplete="off">
                            <button type="submit" class="search-btn" >Search</button>
                            <div class="col-md-6" id="productStatus">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->
                 <!-- ACCOUNT -->
        <div class="col-md-3 clearfix">
            <div class="header-ctn">
                {{-- <!-- Wishlist -->
                <div>
                    <a href="#">
                        <i class="fa fa-heart-o"></i>
                        <span>Your Wishlist</span>
                        <div class="qty">2</div>
                    </a>
                </div>
                <!-- /Wishlist --> --}}

                <!-- Cart -->
                        @php
                            $contents = Cart::content();
                            $total = 0;
                            $itemCount = 0;
                        @endphp
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Your Cart</span>
                        <div class="qty">
                            {{Cart::count()}}
                        </div>
                    </a>
                    <div class="cart-dropdown">
                        <div class="cart-list">
                            @foreach ($contents as $item)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="public/Upload/Product_images/{{ $item->options->image }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="#">{{ $item->name }}</a></h3>
                                    <h4 class="product-price"><span class="qty">{{ $item->qty }}x</span>{{ $item->price }} TK</h4>
                                </div>
                                <a href="{{route('cart.delete',$item->rowId)}}" class="delete"><i class="fa fa-close"></i></a>
                            </div>
                            @php
                            $itemCount++;
                            $total +=$item->subtotal;
                            @endphp
                            @endforeach
                        </div>
                        <div class="cart-summary">
                            <small class="itemVal" >{{$itemCount}} Item(s) selected</small>
                            <h5>SUBTOTAL: {{$total}} TK</h5>
                        </div>
                        <div class="cart-btns">
                            <a href=" {{route('cart.show')}} ">View Cart</a>
                            <a href=" {{route('customer.checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Cart -->

                <!-- Menu Toogle -->
                <div class="menu-toggle">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Menu</span>
                    </a>
                </div>
                <!-- /Menu Toogle -->
            </div>
        </div>
        <!-- /ACCOUNT -->

            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('#slug').keyup(function(){

            var slug = $(this).val();

            if(slug != ''){

                $.ajax({
                    url:"{{route('product.get')}}",
                    type:"GET",
                    data:{slug:slug},
                    success:function(data){
                        $("#productStatus").fadeIn();
                        $("#productStatus").html(data);
                    }
                });
            }
        });
    });

    $(document).on('click','li',function(){

        $('#slug').val($(this).text());
        $("#productStatus").fadeOut();

    });
</script>
