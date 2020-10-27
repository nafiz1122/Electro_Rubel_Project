<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category-list',compact('categories'));
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
            'category_name'=>'required|min:2',
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->status= '1';
        $category->save();

        return redirect()->route('category.list')->with('message',"Category Insert Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $category =Category::find($id);
        return view('admin.category.edit-category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        $this->validate($request,[
            'category_name'=>'required|min:2',
        ]);

        $category = Category::find($id);
        $category->name = $request->category_name;
        $category->status= '1';
        $category->update();
        return redirect()->route('category.list')->with('message',"Category Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();
        //notification
        $notification = array(
            'message' =>'Cart add Successfully ',
            'alert-type' =>'error'
        );
        return back()->with($notification);
    }
}
