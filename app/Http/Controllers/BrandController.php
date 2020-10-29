<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.brand-list',compact('brands'));
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
        $this->validate($request,[
            'brand_name'=>'required|min:2',
        ]);

        $Brand = new Brand();
        $Brand->name = $request->brand_name;
        $Brand->status= '1';
        $Brand->save();

        return redirect()->route('brand.list')->with('message',"Brand Insert Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand,$id)
    {

        $brand =Brand::find($id);
        return view('admin.brand.edit-brand',compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand,$id)
    {
        $this->validate($request,[
            'brand_name'=>'required|min:2',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->brand_name;
        $brand->status= '1';
        $brand->update();
        return redirect()->route('brand.list')->with('message',"Brand Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand,$id)
    {

         $deleteBrand = Brand::find($id);
         $deleteBrand->delete();
         //notification
         $notification = array(
             'message' =>'Brand Delete Successfully ',
             'alert-type' =>'error'
         );
         return back()->with($notification);

    }
}
