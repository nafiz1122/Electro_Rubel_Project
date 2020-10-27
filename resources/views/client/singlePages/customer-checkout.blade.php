@extends('layouts.client_master')

@section('content')
<style>
    .panel-body{
        background-color: #F4F4F4;
        padding: 25px;
    }
    .panel-heading{
        border-bottom: 2px solid #0089d0!important;
    }
    h1{
        color: #000000;
        font-size: 16px;
        font-weight: 600;
    }
    span{
        background: #0089d0;
        color: #ffffff;
        padding: 7px 13px;
        border-radius: 20px;
        margin-right: 10px;
        margin-bottom: 5px;
        display: inline-block;
    }
</style>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">Cart</a></li>
							<li><a href="#">Checkout</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1><span>1</span>Customer Information</h1 class="text-center">
                </div>
                <div class="panel-body">
                    <form action=" {{route('checkout.store')}} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Customer Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Customer Name">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input class="form-control" type="text" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input class="form-control" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="">Address </label>
                            <input class="form-control" type="text" name="address" placeholder="Customer address">
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1><span>2</span>Order Overview</h1 class="text-center">
                </div>
                <div class="panel-body">
                    <div class="order-summary">
                        @php
                            $contents = Cart::content();
                            $total = 0;
                        @endphp
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                        @foreach ($contents as $item)
                            <div class="order-col">
                                <div>{{$item->qty}} x  {{$item->name}} </div>
                                <div>{{$item->price}} TK</div>
                            </div>
                            @php
                                $total +=$item->subtotal;
                            @endphp
                        @endforeach
                        </div>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total"> {{$total}} TK</strong></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Select Payment Method</h5>
                        </div>
                        <div class="col-md-5">
                                @csrf
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
                                <div class="form-group">
                                    <input type="hidden" name="order_total" value=" {{$total}} ">
                                    <select onchange="myFunction()" name="payment_method" id="payment_method" class="form-control">
                                        <option value="">Select Payment type</option>
                                        <option value="Hand Cash">Hand Cash</option>
                                        <option value="Bkash">Bkash</option>
                                    </select>
                                    <font style="color: red">
                                        {{($errors->has('payment_method'))?($errors->first('payment_method')):''}}
                                    </font>
                                    <div id="show_field" style="margin-top: 8px;display:none;">
                                        <label>Bkash No is:01683813854</label>
                                        <input type="text" name="transaction_no" class="form-control" placeholder="write transection no">
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn order-submit" >Place order</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>



@endsection
