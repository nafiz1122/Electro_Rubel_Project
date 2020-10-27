@extends('layouts.admin_master')

@section('title')
Size
@endsection
@section('content')
<style>
    #myImageCanvus{
        margin-top:10px;
        background-image:url(/admin_assets/images/No-image-found.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        height:80px;
        width: 70px;
        border:1px solid rgb(197, 193, 193);
    }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body p-4">
                    <form id="uickForm" action="{{route('product.update',$editProduct->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                          <label>Select Category</label>
                          <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{($editProduct->category_id == $category->id)?"selected":''}} > {{$category->name}} </option>
                             @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                          <label>Select Brand</label>
                          <select name="brand_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" {{($editProduct->brand_id == $brand->id)?"selected":''}} > {{$brand->name}} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Product name</label><br>
                            <input class="form-control" name="product_name" type="text" value=" {{$editProduct->name}} ">
                        </div>
                        <div class="form-group col-md-4">
                          <label>Input Sizes</label><br>
                          <select class="form-control" name="color_name[]" multiple data-role="tagsinput">
                            <option value="Large">Large</option>
                            <option value="Small">Small</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label>Input Colors</label><br>
                          <select class="form-control" name="color_name[]" multiple data-role="tagsinput">
                            <option value="Black">Black</option>
                            <option value="White">White</option>
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Product Code</label><br>
                            <input class="form-control" name="product_code" type="text"  value="{{$editProduct->code}} ">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Short Description</label><br>
                            <textarea class="form-control" name="short_des" id="" cols="30" rows="10"> {{$editProduct->short_des}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Long Description</label><br>
                            <textarea class="form-control" name="long_des" id="" cols="30" rows="10">{{$editProduct->long_des}}</textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Product Price</label><br>
                            <input class="form-control" type="text" name="product_price" value=" {{$editProduct->price}} ">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Image</label><br>
                            <input type="file" name="image"  onchange="readURL(this);">
                            {{-- <img  width="80px" src="/public/Upload/Product_images/{{$editProduct->image}}" alt="pl"> --}}
                        </div>
                        <div class="form-group col-md-3 ml-auto">
                            <canvas id="myImageCanvus" alt="dd" src="/public/Upload/Product_images/{{$editProduct->image}}" class="img">
                            </canvas>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Multiple Images</label><br>
                            <input type="file" name="sub_image[]" id="image" multiple>
                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>

                  </div>
            </div>
        </div>

    </div>
</div>


@endsection
@section('script')

<script>
    $(function () {
        $('#uickForm').validate({
            rules: {

                product_name: {
                    required: true,
                },
                product_price: {
                    required: true,
                },
                product_code: {
                    required: true,
                },
                color_name: {
                    required: true,
                },
                short_des: {
                    required: true,
                },

            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection
