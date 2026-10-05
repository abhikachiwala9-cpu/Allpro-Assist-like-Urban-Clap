<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Banner::latest()->paginate(3);
        // print_r($data);
        return view('banner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "banner_name"=>'required',
            "banner_pic"=>"required"
        ]);

        // Pic upload
        $imgName="ban".time().".".$request->banner_pic->extension();
        $request->banner_pic->move(public_path('img'),$imgName);
        $imgPath="/img/".$imgName;

        // Pic upload end
        // insert
        $table=new Banner();
        $table->banner_name=$request->banner_name;
        $table->banner_pic=$imgPath;
        if(strcmp($request->status,"on")==0){
            $table->status=true;
        }else{
            $table->status=false;
        }
        $table->save();

        return redirect("/banner");
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
        return view('banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
        $request->validate([
            "banner_name"=>'required',
            "banner_pic"=>"required"
        ]);

        $table=Banner::find($banner->_id);
        $table->banner_name=$request->banner_name;

        if(isset($request->banner_pic)){
            $imgName="ban".time().".".$request->banner_pic->extension();
            $request->banner_pic->move(public_path('img'),$imgName);
            $imgPath="/img/".$imgName;
            $table->banner_pic=$imgPath;
        }
        if(strcmp($request->status,"on")==0){
            $table->status=true;
        }else{
            $table->status=false;
        }
        $table->save();
        return redirect("/banner")->withSuccess("Update successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->delete();
        return redirect("/banner")->withSuccess('Deleted');
    }
}
