<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        return view('admin.product.product-list',compact('products'));
    }

    public function add()
    {
        $categories  =Category::all();
        $brands      =Brand::all();
        return view('admin.product.product-add',compact('categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        DB::transaction(function() use($request){
            $this->validate($request,[
                'category_id'=>'required|max:8',
                'brand_id'=>'required',
                'product_name'=>'required',
                'product_price'=>'required',
                'short_des'=>'required',
                'long_des'=>'required',
             ]);

            $product = new Product;

            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->product_name;
            $product->slug = str_slug($product->name, "-");
            $product->code = $request->product_code;
            $product->short_des = $request->short_des;
            $product->long_des = $request->long_des;
            $product->price = $request->product_price;
            $product->status = '1';
            //image Upload
            $img =$request->file('image');
            if($img){
                $imgName = date('YmsHi').$img->getClientOriginalName();
                $img->move('public/Upload/Product_images/',$imgName);
                $product->image =$imgName;
            }
            //now upload another table data
            if($product->save()){
                $files = $request->sub_image;
                if (!empty($files)) {

                        foreach ($files as $file) {
                        $imgName = date('YmsHi').$file->getClientOriginalName();
                        $file->move('public/Upload/Product_images/Product_Sub_Images',$imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image =  $imgName;
                        $subimage->save();
                    }
                }
                //color table upload
                $colors = $request->color_name;
                if (!empty($colors)) {
                    foreach ($colors as $key => $color) {
                        $mycolor = new ProductColor();
                        $mycolor->product_id = $product->id;
                        $mycolor->color_name = $color;
                        $mycolor->save();
                    }
                }
                //sizes table upload
                $sizes = $request->size_name;
                if (!empty($sizes)) {
                    foreach ($sizes as $key => $size) {
                        $mysize = new ProductSize();
                        $mysize->product_id =$product->id;
                        $mysize->size_name = $size;
                        $mysize->save();
                    }
                }

            }
        });
        return redirect()->route('product.list')->with('message','product Add Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $editProduct = Product::find($id);
        $categories    = Category::all();
        $brands       = Brand::all();

        $color_array = ProductColor::select('color_name')->where('product_id',$editProduct->id)->get();
        //dd($color_array);
        $size_array  = ProductSize::where('product_id',$editProduct->id)->get();
        //dd($color_array->);
        return view('admin.product.product-edit',compact('editProduct','categories','brands','color_array','size_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        DB::transaction(function() use($request,$id){

            $product = Product::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->product_name;
            $product->code = $request->product_code;
            $product->slug = str_slug($product->name, "-");
            $product->short_des = $request->short_des;
            $product->long_des = $request->long_des;
            $product->price = $request->product_price;
            //image Upload
            $img =$request->file('image');
            if($img){
                $imgName = date('YmsHi').$img->getClientOriginalName();
                $img->move('public/Upload/Product_images/',$imgName);
                if(file_exists('public/Upload/Product_images/'.$product->image) AND !empty($product->image))
                {
                    unlink('public/Upload/Product_images/'.$product->image);
                }
                $product->image =$imgName;
            }
            //now upload another table data
            if($product->save()){
                $files = $request->sub_image;
                //first truncate image
                if(!empty($files)){
                    $subimage =ProductSubImage::where('product_id',$id)->get()->toArray();
                    foreach($subimage as $value){
                        if(!empty($value)){
                            unlink('public/Upload/Product_images/Product_Sub_Images/'.$value['sub_image']);
                        }
                    }
                    ProductSubImage::where('product_id',$id)->delete();
                }

                if (!empty($files)) {
                        foreach ($files as $file) {
                        $imgName = date('YmsHi').$file->getClientOriginalName();
                        $file->move('public/Upload/Product_images/Product_Sub_Images',$imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image =  $imgName;
                        $subimage->save();
                    }
                }
                //colors table upload
                $colors = $request->color_name;
                //first delete preioud color
                if (!empty($colors)){
                    ProductColor::where('product_id',$id)->delete();
                }
                if (!empty($colors)) {
                    foreach ($colors as $key => $color) {
                        $mycolor = new ProductColor();
                        $mycolor->product_id =$product->id;
                        $mycolor->color_name = $color;
                        $mycolor->save();
                    }
                }
                //sizes table upload
                $sizes = $request->size_name;
                //first delete preioud size
                if (!empty($sizes)){
                    ProductSize::where('product_id',$id)->delete();
                }
                if (!empty($sizes)) {
                    foreach ($sizes as $key => $size) {
                        $mysize = new ProductSize();
                        $mysize->product_id =$product->id;
                        $mysize->size_name = $size;
                        $mysize->save();
                    }
                }
            }
            else{
                return back()->with('message','Sorry Data not Updated');
            }
        });
        return redirect()->route('product.list')->with('message','Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        $product = Product::find($id);
        //dd($product);
        if(file_exists('public/Upload/Product_images/'.$product->image) AND !empty($product->image))
                {
                    unlink('public/Upload/Product_images/'.$product->image);
                }
        $subimage = ProductSubImage::where('product_id',$id)->get()->toArray();

        foreach($subimage as $value){
            if(!empty($value)){
                unlink('public/Upload/Product_images/Product_Sub_Images/'.$value['sub_image']);
            }
        }
        ProductSubImage::where('product_id',$id)->delete();
        ProductColor::where('product_id',$id)->delete();
        ProductSize::where('product_id',$id)->delete();
        $product->delete();
        return back()->with('message','Delete Successfully');
    }
}
