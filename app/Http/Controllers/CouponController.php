<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Coupon::latest()->paginate(3);
        // print_r($data);
        return view('coupon.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "c_code"=>'required',
            "c_desc"=>'required',
            "c_title"=>'required',
            "c_discount"=>'required',
            "c_maxamt"=>'required',
            "c_pic"=>"required"
        ]);

        // Pic upload
        $imgName="cop".time().".".$request->c_pic->extension();
        $request->c_pic->move(public_path('img'),$imgName);
        $imgPath="/img/".$imgName;

        // Pic upload end
        // insert
        $table=new Coupon();
        $table->c_code=$request->c_code;
        $table->c_desc=$request->c_desc;
        $table->c_title=$request->c_title;
        $table->c_discount=$request->c_discount;
        $table->c_maxamt=$request->c_maxamt;
        $table->c_pic=$imgPath;
        if(strcmp($request->status,"on")==0){
            $table->status=true;
        }else{
            $table->status=false;
        }
        $table->save();

        return redirect("/coupon");
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
        return view('coupon.show',compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
        return view('coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
        $request->validate([
            "c_code"=>'required',
            "c_desc"=>'required',
            "c_title"=>'required',
            "c_discount"=>'required',
            "c_maxamt"=>'required',
            "c_pic"=>"required"
        ]);

        $table=Coupon::find($coupon->_id);
        $table->c_code=$request->c_code;
        $table->c_desc=$request->c_desc;
        $table->c_title=$request->c_title;
        $table->c_discount=$request->c_discount;
        $table->c_maxamt=$request->c_maxamt;

        if(isset($request->c_pic)){
            $imgName="cop".time().".".$request->c_pic->extension();
            $request->c_pic->move(public_path('img'),$imgName);
            $imgPath="/img/".$imgName;
            $table->c_pic=$imgPath;
        }
        if(strcmp($request->status,"on")==0){
            $table->status=true;
        }else{
            $table->status=false;
        }
        $table->save();
        return redirect("/coupon")->withSuccess("Update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
        $coupon->delete();
        return redirect("/coupon")->withSuccess('Deleted');
    }
}
