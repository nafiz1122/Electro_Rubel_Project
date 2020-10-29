@extends('layouts.admin_master')

@section('title')
Size
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-head">
                        <h3>All Product</h3>
                        <a class="btn btn-success btn-sm pull-right m-2" href="{{ route('product.add') }}"><i class="fa fa-plus-circle mr-1" ></i>Add Product</a>
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
                        {{--  --------NOTIFICATION------  --}}
                        @if(Session::has('message'))
                            <p class="alert alert-info mt-2">{{ Session::get('message') }}</p>
                        @endif

                    </div>
                    <br>
                {{--  if want to use Datatable id="mydatatable"  --}}
                <table id="mydatatable"  class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Code</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td>#{{$product->code}} </td>
                        <td> {{$product->category->name}} </td>
                        <td>{{$product->brand->name}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} TK</td>
                        <td>
                            <img  width="80" height="80" src="/public/Upload/Product_images/{{ $product->image }}" alt="Image">
                        </td>
                            <td width="15%" >
                                <a class="btn btn-success btn-sm" href=" {{route('product.view',$product->id)}}"> <i class="fa fa-eye"></i></a>

                                <a class="btn btn-primary btn-sm" href=" {{route('product.edit',$product->id)}}"> <i class="fa fa-edit" ></i> </a>

                                <a id="delete" class="btn btn-danger btn-sm" href="{{route('product.delete',$product->id)}}" data-token=" {{csrf_token()}}" data-id="{{$product->id}}" > <i class="fa fa-trash" ></i> </a>
                            </td>

                    </tr>
                    @endforeach
                </tbody>

                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
