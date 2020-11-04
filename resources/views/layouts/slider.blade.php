

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row ">
            <!-- shop -->
            <div class="slick_slider">
            @php
                $sliders = App\Models\Slider::all();
            @endphp
            @foreach ($sliders as $slider)

            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img   src="/public/Upload/Slider_images/{{ $slider->slider_image }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{$slider->slider_name}}<br>Collection</h3>
                        <a href=" {{route('product_store')}} " class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /shop -->
            </div>

            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

