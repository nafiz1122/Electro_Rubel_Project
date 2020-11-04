@extends('layouts.admin_master')

@section('title')
Order
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Order</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Pending Order</li>
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
                        <h3>Pending Order</h3>
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
                            {{-- <p class="alert alert-info mt-2">{{ Session::get('message') }}</p> --}}
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span class="text-white" aria-hidden="true">&times;</span>
                                </button>
                              </div>
                        @endif

                    </div>
                    <br>
                {{--  if want to use Datatable id="mydatatable"  --}}
                <table id="mydatatable"  class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Order No.</th>
                        <th>Order Total</th>
                        <th>Payment type</th>
                        <th>Order Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td> {{$order->order_no}} </td>

                        <td>{{$order->order_total}} TK</td>
                        <td>
                            {{$order->payment->payment_method }}
                            @if ($order->payment->payment_method == 'Bkash')
                                (Transaction no:{{$order->payment->transaction_no}})
                            @endif
                        </td>
                        <td>
                            {{$order->created_at->diffForHumans()}}({{$order->created_at->format('d.m.Y')}})
                        </td>
                        <td>
                             @if ($order->status  == '0')
                                <span class="badge badge-danger">Pending</span>
                             @endif
                        </td>
                        <td>
                            <a id="active" href=" {{route('order.active',$order->id)}} " class="btn btn-info btn-sm" ><i class="fas fa-thumbs-up"></i></a>
                            <a id="active" href=" {{route('order.delete',$order->id)}} " class="btn btn-danger btn-sm" ><i class="fa fa-trash" ></i></a>
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
<!-- Sweet Alert Notification -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 {{-- ///sweet alert --}}
 <script>

    $(document).on('click','#active',function(e){
          e.preventDefault();
          var link = $(this).attr("href");
          Swal.fire({
              title: 'Are you sure?',
              text: "Approved this Order!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Active it!'
              }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = link;
                  Swal.fire(
                  'Approved!',
                  'Your Order has been Approved.',
                  'success'
                  )
              }
          })
    });
</script>

@endsection
