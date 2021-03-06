@extends('layouts.admin_master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!--------Modal--------->
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="quickForm" action="{{route('category.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input id="input" type="text" name="category_name" class="form-control" placeholder="Name">
                    <p style="color: red" id="error">{{($errors->has('name'))?($errors->first('name')):''}}</p>
                </div>
                <div class="form-group col-md-12 pull-left mt-2">
                    <input type="submit" value="submit" class="btn btn-success" >
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!--------Modal--------->
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
                     <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" >Add Category</a>
                  </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Category Name</th>
                            <th>Product Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$category->name}} </td>
                                <td>
                                    @php
                                        $product = App\Models\Product::where('category_id',$category->id)->get();

                                            echo count($product);

                                    @endphp
                                </td>
                                <td width="15%" >
                                    <a class="btn btn-info btn-sm" href=" {{route('category.edit',$category->id)}} "> <i class="fa fa-edit" ></i> </a>
                                    @if (count($product) == 0 )
                                      <a id="delete" class="btn btn-danger btn-sm" href="{{route('category.delete',     $category->id)}}"> <i class="fa fa-trash" ></i> </a>
                                    @endif



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
