@extends('layouts.admin_master')

@section('title')
Size
@endsection
@section('content')
<div class="container">
    <div class="row">


        <div class="col-md-7 mt-5">
            <div class="card m-3">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-list" ></i> Billing Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->shipping->customer_name}} </td>
                                <td>{{$order->shipping->phone}}</td>
                                <td>{{$order->shipping->email}}</td>
                                <td>{{$order->shipping->city}}</td>
                                <td>{{$order->shipping->address}}</td>
                            </tr>
                        </tbody>
                  </table>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card m-3">
                <div class="card-header bg-warning">
                  <h3 class="card-title"><i class="fa fa-list" ></i> Order Details</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Product Color</th>
                                <th>Product Size</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Product Sub Total</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order['orderdetail'] as $details)
                            <tr>
                                <td> {{$details->order_id}} </td>
                                <td width="12%">
                                    <img width="60px" src="/public/Upload/Product_images/{{ $details['product']->image }}" alt="Image">
                                </td>
                                <td> {{$details['product']->name}}</td>
                                <td> {{$details->color_name}}</td>
                                <td> {{$details->size_name}}</td>
                                <td>{{$details['product']->price}} TK</td>
                                <td>{{$details->quantity}}</td>
                                <td>
                                    @php
                                        $sub_total = $details->quantity*$details['product']->price;
                                    @endphp
                                    {{$sub_total}} TK
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" style="text-align: right"><b>Grand Total</b></td>
                                <td><b> {{$order->order_total}} TK</b></td>
                            </tr>
                        </tbody>
                  </table>
                </div>
              </div>
        </div>

    </div>
</div>
@endsection
