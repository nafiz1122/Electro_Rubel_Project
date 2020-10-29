@extends('layouts.admin_master')

@section('title')
Size
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
            <li class="breadcrumb-item active">Approved Order</li>
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
                        <h3>Approved Order</h3>
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
                        <td> #{{$order->order_no}} </td>
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
                             @if ($order->status  == '1')
                                <span class="badge badge-primary">Approved</span>

                             @endif
                        </td>

                        <td>
                            <a href=" {{route('order.details',$order->id)}} " class="btn btn-info btn-sm" ><i class="fa fa-eye"></i>Details</a>
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
