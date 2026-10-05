<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_cat;
use Illuminate\Http\Request;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Sub_cat::latest()->paginate(5);
        return view('sub_cat.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        $data=Category::get();
        return view('sub_cat.create',compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "s_name"=>'required | unique:category',
            "s_pic"=>"required",
            "cat_id"=>"required"
        ]);

        // Pic upload
        $imgName="scat".time().".".$request->s_pic->extension();
        $request->s_pic->move(public_path('img'),$imgName);
        $imgPath="/img/".$imgName;

        // Pic upload end
        // insert
        $table=new sub_cat();
        $table->s_name=$request->s_name;
        $table->cat_id=$request->cat_id;
        $table->s_pic=$imgPath;
        $table->save();

        return redirect("/sub_cat");
  

    }

    /**
     * Display the specified resource.
     */
    public function show(Sub_cat $sub_cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sub_cat $sub_cat)
    {
        //
        $data=Category::get();

        return view('sub_cat.edit',compact('sub_cat','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sub_cat $sub_cat)
    {
        //
        $request->validate([
            "s_name"=>'required'
        ]);

        $table=sub_cat::find($sub_cat->_id);
        $table->s_name=$request->s_name;
        $table->cat_id=$request->cat_id;


        if(isset($request->s_pic)){
            $imgName="cat".time().".".$request->s_pic->extension();
            $request->s_pic->move(public_path('img'),$imgName);
            $imgPath="/img/".$imgName;
            $table->s_pic=$imgPath;
        }
        $table->save();
        return redirect("/sub_cat")->withSuccess("Update successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sub_cat $sub_cat)
    {
        //
        $sub_cat->delete();
        return redirect("/sub_cat")->withSuccess('Deleted');
    }
}
