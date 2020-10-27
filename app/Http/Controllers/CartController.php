<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Cart;
class CartController extends Controller
{
    //add to cart
    public function add_to_cart(Request $request)
    {
        $product_info = Product::where('id',$request->product_id)->first();
        $product_size = ProductSize::where('id',$request->size_id)->first();
        $product_color = ProductColor::where('id',$request->color_id)->first();
        Cart::add([
            'id'        => $product_info->id,
            'qty'       =>$request->qty,
            'price'     => $product_info->price,
            'name'      =>$product_info->name,
            'weight'    =>550,
            'options' =>[
                'size_name' => $product_size->size_name,
                'color_name' => $product_color->color_name,
                'image' =>$product_info->image
            ]
        ]);
        ///dd(Cart::content());
        //notification
        $notification = array(
            'message' =>'Cart add Successfully ',
            'alert-type' =>'success'
             );
        return redirect()->route('cart.show')->with($notification);
    }

    public function show_cart()
    {
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        return view('client.singlePages.view_Cart',compact('categories'));
    }
    //cart update
    public function update_cart(REQUEST $request)
    {
        Cart::update($request->rowId,$request->qty);
        $notification = array(
            'message' =>'Cart Update Successfully ',
            'alert-type' =>'success'
             );
        return back()->with($notification);
    }

    //delete cart
    public function delete_cart($rowId)
    {
        Cart::remove($rowId);

        $notification = array(
            'message' =>'Cart Delete Successfully ',
            'alert-type' =>'error'
             );
        return back()->with($notification);
    }
}
