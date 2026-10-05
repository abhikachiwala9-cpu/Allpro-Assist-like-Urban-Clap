<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Sub_cat;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Service::latest()->paginate(3);
        return view('service.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data=Sub_cat::get();
        return view('service.create',compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "sr_name"=>'required',
            "sr_pic1"=>'required',
            "sr_pic2"=>'required',
            "sr_pic3"=>'required',
            "sr_video"=>'required',
            "sr_duration"=>"required",
            "gender"=>"required",
            "description"=>"required",
            "sr_price"=>"required",
            "discount"=>"required",
            "sub_id"=>"required"
        ]);

        // Pic upload
        $imgName1="sr_pic1".time().".".$request->sr_pic1->extension();
        $request->sr_pic1->move(public_path('img'),$imgName1);
        $imgPath1="/img/".$imgName1;

        $imgName2="sr_pic2".time().".".$request->sr_pic2->extension();
        $request->sr_pic2->move(public_path('img'),$imgName2);
        $imgPath2="/img/".$imgName2;

        $imgName3="sr_pic3".time().".".$request->sr_pic3->extension();
        $request->sr_pic3->move(public_path('img'),$imgName3);
        $imgPath3="/img/".$imgName3;

        $videoName="sr_video".time().".".$request->sr_video->extension();
        $request->sr_video->move(public_path('img'),$videoName);
        $videoPath="/img/".$videoName;


        // Pic upload end
        // insert
        $table=new Service();
        $table->sr_name=$request->sr_name;
        $table->sr_pic1=$imgPath1;
        $table->sr_pic2=$imgPath2;
        $table->sr_pic3=$imgPath3;
        $table->sr_video=$videoPath;
        $table->sr_duration=$request->sr_duration;
        $table->gender=$request->gender;
        $table->description=$request->description;
        $table->sr_price=$request->sr_price;
        $table->discount=$request->discount;
        $table->sub_id=$request->sub_id;
        
        $table->save();

        return redirect("/service");
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
        return view('service.show',compact('service'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        $data=Sub_cat::get();
        return view('service.edit',compact('service','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
        $request->validate([
            "sr_name"=>'required',
            "sr_pic1"=>'required',
            "sr_pic2"=>'required',
            "sr_pic3"=>'required',
            "sr_video"=>'required',
            "sr_duration"=>"required",
            "gender"=>"required",
            "description"=>"required",
            "sr_price"=>"required",
            "discount"=>"required",
            "sub_id"=>"required"
        ]);

        $table=Service::find($service->_id);
        $table->sr_name=$request->sr_name;
        $table->sr_duration=$request->sr_duration;
        $table->gender=$request->gender;
        $table->description=$request->description;
        $table->sr_price=$request->sr_price;
        $table->discount=$request->discount;
        $table->sub_id=$request->sub_id;
        
        if(isset($request->sr_pic1)){
            $imgName1="sr_pic1".time().".".$request->sr_pic1->extension();
            $request->sr_pic1->move(public_path('img'),$imgName1);
            $imgPath1="/img/".$imgName1;
            $table->sr_pic1=$imgPath1;
        }

        if(isset($request->sr_pic2)){
            $imgName2="sr_pic2".time().".".$request->sr_pic2->extension();
            $request->sr_pic2->move(public_path('img'),$imgName2);
            $imgPath2="/img/".$imgName2;
            $table->sr_pic2=$imgPath2;
        }

        if(isset($request->sr_pic3)){
            $imgName3="sr_pic3".time().".".$request->sr_pic3->extension();
            $request->sr_pic3->move(public_path('img'),$imgName3);
            $imgPath3="/img/".$imgName3;
            $table->sr_pic3=$imgPath3;
        }

        if(isset($request->sr_video)){
            $videoName="sr_video".time().".".$request->sr_video->extension();
            $request->sr_video->move(public_path('img'),$videoName);
            $videoPath="/img/".$videoName;
            $table->sr_video=$videoPath;
        }

        $table->save();
        return redirect("/service")->withSuccess("Update successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        return redirect("/service")->withSuccess('Deleted');
    }
}
