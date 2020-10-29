@extends('layouts.admin_master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Slider</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Slider</li>
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
          <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="myform" action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Slider Name</label>
                    <input id="input" type="text" name="slider_name" class="form-control" placeholder="Name">
                    <p style="color: red" id="error">{{($errors->has('name'))?($errors->first('name')):''}}</p>
                </div>
                <div class="form-group">
                    <label for="">Upload Image</label><br>
                    <input type="file" name="slider_image">
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
                     <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" >Add Slider</a>
                  </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Slider Name</th>
                            <th>Slider Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key => $slider)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$slider->slider_name}} </td>
                            <td width="25%">
                                <img  width="80" height="80" src="/public/Upload/Slider_images/{{ $slider->slider_image }}" alt="Slider Image">
                            </td>
                            <td  width="15%" >
                                    {{-- <a class="btn btn-primary btn-sm" href=" {{route('slider.edit',$slider->id)}}"> <i class="fa fa-edit" ></i> </a> --}}
                                    <a id="delete" class="btn btn-danger btn-sm" href="{{route('slider.delete',$slider->id)}}" data-token=" {{csrf_token()}}" data-id="{{$slider->id}}" > <i class="fa fa-trash" ></i> </a>
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
@section('script')

<script>
      $(function () {
            $('#myform').validate({
                rules: {
                    slider_name: {
                        required: true,
                    },
                    slider_image: {
                        required: true,
                    },
                },
                messages: {
                    slider_name: {
                        required: "Please enter a slider name",

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
