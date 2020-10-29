<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{
    public function index(){

        $sliders = Slider::all();
        return view('admin.slider.slider-list',compact('sliders'));
    }

    public function store(REQUEST $request){

        $this->validate($request,[
            'slider_name'=>'required|max:15',
            'slider_image'=>'required',
         ]);

        $sliders = new Slider;

        $sliders->slider_name  = $request->slider_name;
        //image Upload
        $img = $request->file('slider_image');
        if($img){
            $imgName = date('YmsHi').$img->getClientOriginalName();
            $img->move('public/Upload/Slider_images/',$imgName);
            $sliders->slider_image = $imgName;
        }
        $sliders->save();

        return redirect()->route('slider.list')->with('message',"Slider Add Successfully");

    }

    public function destroy($id){
        $Slider = Slider::find($id);
        //dd($Slider);
        if(file_exists('public/Upload/Slider_images/'.$Slider->slider_image) AND !empty($Slider->slider_image))
            {
                unlink('public/Upload/Slider_images/'.$Slider->slider_image);
            }
        $Slider->delete();

        return back()->with('message','Slider Delete Successfully');
    }
}
