<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function pending_order()
    {
        $orders = Order::where('status','0')->get();
        return view('admin.order.pending-orders',compact('orders'));
    }

    public function approved_order()
    {
        $orders = Order::orderBy('id', 'DESC')->where('status','1')->get();
        return view('admin.order.approved-orders',compact('orders'));
    }

    public function order_details($id)
    {
        $order_data = Order::find($id);
        $order = Order::where('id',$order_data->id)->first();
        //dd($order->shipping);
        return view('admin.order.order-details',compact('order'));
    }
    //order active
    public function active_order($id)
    {
        $order_data = Order::find($id);
        $order_data->status = '1';
        $order_data->update();

        return back()->with('message',"Order Approved Successfully");

    }
}
