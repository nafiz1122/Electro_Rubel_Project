<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\ProductColor;
use DB;
class ClientController extends Controller
{
    public function index()
    {
        $categories = Product::select('category_id')->groupBy('category_id')->get();

        //dd($categories);
        //dd(count($categori));
        $products   = Product::orderBy('id','desc')->get();
        return view('client.content',compact('products','categories'));
    }


    public function product_store()
    {
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        $brands = Product::select('brand_id')->groupBy('brand_id')->get();
        $products   = Product::orderBy('id','desc')->paginate(9);
        return view('client.singlePages.product-store',compact('products','categories','brands'));
    }

    //prooduct  show by category
    public function productByCategory($category_id)
    {
        $brands = Product::select('brand_id')->groupBy('brand_id')->get();
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        $products   = Product::orderBy('id','desc')->where('category_id',$category_id)->get();
        return view('client.singlePages.productByCategory',compact('products','categories','brands'));
    }
    //prooduct  show by Brand
    public function productByBrand($brand_id)
    {
        $brands = Product::select('brand_id')->groupBy('brand_id')->get();
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        $products   = Product::orderBy('id','desc')->where('brand_id',$brand_id)->get();
        return view('client.singlePages.productByBrand',compact('products','brands','categories'));
    }



    //prooduct Details show
    public function product_Details($slug)
    {
        //return "OK";
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        $product    = Product::where('slug',$slug)->first();
        //dd($product->name);
        $product_sizes  = ProductSize::where('product_id',$product->id)->get();
        $product_colors = ProductColor::where('product_id',$product->id)->get();
        //dd($product_sizes);
        return view('client.singlePages.product_details_cart',compact('product','categories','product_sizes','product_colors'));
    }

    //product search
    public function productSearch(REQUEST $request)
    {
        $slug = $request->slug;
        $product    = Product::where('slug',$slug)->first();
        if($product){
            $categories = Product::select('category_id')->groupBy('category_id')->get();
            $product    = Product::where('slug',$slug)->first();
            //dd($product->name);
            $product_sizes  = ProductSize::where('product_id',$product->id)->get();
            $product_colors = ProductColor::where('product_id',$product->id)->get();
            //dd($product_sizes);
            return view('client.singlePages.product-search',compact('product','categories','product_sizes','product_colors'));
        }else{
            return back()->with('message','Cannot find any product');
        }
    }

    public function productGet(REQUEST $request)
    {
        $slug = $request->slug;
        $productData = DB::table('products')
                        ->where('slug','LIKE','%'.$slug.'%')->get();

        $html =' ';
        $html .='<div><ul>';

        if($productData){
            foreach($productData as $v){
                $html .='<li>'.$v->slug.'</li>';
            }
        }
        $html .='</ul></div>';
        //dd($html);

        return response()->json($html);
    }
}
