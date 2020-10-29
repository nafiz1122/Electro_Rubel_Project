<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use Mail;
use DB;
use Cart;
class CheckoutController extends Controller
{
    public function checkout(REQUEST $request)
    {

        $categories = Product::select('category_id')->groupBy('category_id')->get();


        return view('client.singlePages.customer-checkout',compact('categories'));

    }


    public function checkout_store(REQUEST $request)
    {
        if($request->order_total == 0){
            return back()->with('message','Please add any product');
        }else{

        $this->validate($request,[
            'payment_method' => 'required',
        ]);
        if($request->payment_method == 'Bkash'){
            $this->validate($request,[
                'transaction_no' => 'required',
            ]);
        }
        DB::transaction(function () use($request) {
            $shipping = new Shipping();
            $shipping->customer_name    = $request->name;
            $shipping->phone   = $request->phone;
            $shipping->email   = $request->email;
            $shipping->city    = $request->city;
            $shipping->address = $request->address;
            $shipping->save();

            //payment
            $payment = new Payment();
            $payment->payment_method = $request->payment_method;
            $payment->transaction_no = $request->transaction_no;
            $payment->save();

            //order
            $order = new Order();
            $order->shipping_id = $shipping->id;
            $order->payment_id  = $payment->id;
            $order_data = Order::orderBy('id','desc')->first();
            if($order_data == NULL){
                $firstReg ='0';
                $order_no =$firstReg+1;
            }else{
                $order_data = Order::orderBy('id','desc')->first()->order_no;
                $order_no =$order_data+1;
            }
            //dd($order_no);
            $order->order_no = $order_no;
            $order->order_total = $request->order_total;
            $order->status = '0';
            $order->save();

            $contents = Cart::content();
            foreach($contents as $content)
            {
                $order_details = new OrderDetail();
                $order_details->order_id =$order->id;
                $order_details->product_id =$content->id;
                $order_details->color_name =$content->options->color_name;
                $order_details->size_name =$content->options->size_name;
                $order_details->quantity =$content->qty;
                $order_details->save();
            }
            Cart::destroy();
        });
        return redirect()->route('index')->with('message',"Order Successfully we will contact with you soon");
        }
    }












    // public function customer_login()
    // {
    //     $categories = Product::select('category_id')->groupBy('category_id')->get();
    //     return view('client.singlePages.customer_login',compact('categories'));
    // }
    // public function customer_sign_up()
    // {
    //     $categories = Product::select('category_id')->groupBy('category_id')->get();
    //     return view('client.singlePages.customer_sign_up',compact('categories'));
    // }

    // //sign up store
    // public function customer_sign_up_store(REQUEST $request)
    // {
    //     $code = rand(0000,9999);
    //     $customer = new User;
    //     $customer->name     = $request->name;
    //     $customer->email    = $request->email;
    //     $customer->phone    = $request->phone;
    //     $customer->password = bcrypt($request->password);
    //     $customer->user_type='customer';
    //     $customer->status   = '0';
    //     $customer->code     = $code;
    //     $customer->save();

    //     $data = array(
    //         'name'     =>$request->name,
    //         'email'    =>$request->email,
    //         'phone'    =>$request->phone,
    //         'password' =>$request->password,
    //         'code'     =>$code
    //     );

    //     Mail::send('client.email.customer', $data, function ($message) use($data) {

    //         $message->from('nafiz.ahmed2k24@gmail.com', 'Nafiz Ahmed Doe');
    //         $message->to($data['email']);
    //         $message->subject('Thnx for sign-up');

    //     });
    //     //notification
    //     $notification = array(
    //         'message' =>'Sign-up successfully, Please verify your email',
    //         'alert-type' =>'info'
    //          );
    //     return redirect()->route('verify.sign-up')->with($notification);
    // }

    // public function customer_sign_up_verify()
    // {
    //     $categories = Product::select('category_id')->groupBy('category_id')->get();
    //     return view('client.singlePages.signup_verify',compact('categories'));
    // }

    // //sign -up verify store

    // public function sign_up_verify_store(REQUEST $request)
    // {
    //     $checkVerify = User::where('email',$request->email)->where('code',$request->code)->first();
    //     if($checkVerify){
    //         $checkVerify->status ='1';
    //         $checkVerify->save();
    //         //notification
    //         $notification = array(
    //             'message' =>'Email verify successfully,Please login your account',
    //             'alert-type' =>'success'
    //             );
    //         return redirect()->route('customers.login')->with($notification);

    //     }else{
    //         //notification
    //         $notification = array(
    //             'message' =>'Your email or varification code does not match',
    //             'alert-type' =>'error'
    //             );
    //         return redirect()->back()->with($notification);
    //     }
    // }
}
