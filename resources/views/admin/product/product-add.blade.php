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
    .bootstrap-tagsinput .tag {
    margin: 2px;
    color: #fff;
    background-color: #007bff;
    border: 1px solid #222;
    border-radius: 5px;
    padding: 2px 5px;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Product</li>
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
                    <!-- --------error message------------ -->
                    <div class="col-md-12">
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            <!-- --------error message------------ -->
                </div>
                <div class="card-body p-4">
                    <form id="myform" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                          <label>Select Category</label>
                          <select name="category_id" class="form-control validate[required]" style="width: 100%;">
                            <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id }}" >{{ $category->name }}</option>
                                @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                          <label>Select Brand</label>
                          <select name="brand_id" class="form-control select2" style="width: 100%;">
                            <option value="">Select Brand</option>
                            @foreach ($brands as $brand)
                                    <option value="{{$brand->id }}" >{{ $brand->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Product name</label><br>
                            <input class="form-control" name="name" type="text" placeholder="Product Name">
                        </div>
                        <div class="form-group col-md-4">
                          <label>Input Sizes</label><br>
                          <select class="form-control inputMul"  name="size_name[]" multiple data-role="tagsinput">
                            <option value="small">small</option>
                            <option value="Large">Large</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label>Input Colors</label><br>
                          <select class="form-control inputMul" name="color_name[]" multiple data-role="tagsinput">
                            <option value="Black">Black</option>
                            <option value="White">White</option>
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Product Code</label><br>
                            <input class="form-control" name="code" type="text" placeholder="Product Code">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Short Description</label><br>
                            <textarea class="form-control" name="short_des" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Long Description</label><br>
                            <textarea class="form-control" name="long_des" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Product Price</label><br>
                            <input class="form-control" type="text" name="product_price" placeholder="Price">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Image</label><br>
                            <input type="file" name="image"  onchange="readURL(this);">
                        </div>
                        <div class="form-group col-md-3">
                            <canvas id="myImageCanvus" alt="dd" src="" class="img">
                            </canvas>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Multiple Images</label><br>
                            <input type="file" name="sub_image[]" id="image" multiple>
                        </div>
                    </form>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

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
            $('#myform').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    code: {
                        required: true,
                    },
                    product_price: {
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
