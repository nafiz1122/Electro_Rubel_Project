@extends('layouts.admin_master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Brand</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <!-- --------error message------------ -->
                        <div class="pull-left">
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red" >{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- --------error message------------ -->
                        <div style="float: right" class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{route('brand.list')}}" > <i class="fa fa-list" ></i> Brand List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="quickForm" action="{{route('brand.update',$brand->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Brand Name</label>
                                <input id="input" type="text" name="brand_name" class="form-control" value="{{$brand->name}}">
                                <p style="color: red" id="error">{{($errors->has('name'))?($errors->first('name')):''}}</p>
                            </div>
                            <div class="form-group col-md-12 pull-left mt-2">
                                <input type="submit" value="Update" class="btn btn-info" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
