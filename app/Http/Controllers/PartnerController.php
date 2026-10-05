<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Partner::latest()->paginate(3);
        return view('partner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "partner_name"=>'required',
            "partner_email"=>'required',
            "partner_mob"=>'required | digits:10 | numeric',
            "address"=>'required',
            "aadharcard"=>'required  | digits:12 | numeric',
            "partner_pic"=>"required"
        ]);

        $imgName="part".time().".".$request->partner_pic->extension();
        $request->partner_pic->move(public_path('img'),$imgName);
        $imgPath="/img/".$imgName;

        $table=new Partner();
        $table->partner_name=$request->partner_name;
        $table->partner_email=$request->partner_email;
        $table->partner_mob=$request->partner_mob;
        $table->address=$request->address;
        $table->aadharcard=$request->aadharcard;
        $table->partner_pic=$imgPath;
        // if(strcmp($request->status,"on")==0){
        //     $table->status=true;
        // }else{
        //     $table->status=false;
        // }
        $table->save();

        return redirect("/partner");

    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
        return view('partner.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
        return view('partner.edit',compact('partner'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        //
        $request->validate([
            "partner_name"=>'required',
            "partner_email"=>'required',
            "partner_mob"=>'required | digits:10 | numeric',
            "address"=>'required',
            "aadharcard"=>'required  | digits:12 | numeric',
            "partner_pic"=>"required"
        ]);

        $table=Partner::find($partner->_id);
        $table->partner_name=$request->partner_name;
        $table->partner_email=$request->partner_email;
        $table->partner_mob=$request->partner_mob;
        $table->address=$request->address;
        $table->aadharcard=$request->aadharcard;
        
        if(isset($request->partner_pic)){
            $imgName="part".time().".".$request->partner_pic->extension();
            $request->partner_pic->move(public_path('img'),$imgName);
            $imgPath="/img/".$imgName;
            $table->partner_pic=$imgPath;
        }
        // if(strcmp($request->status,"on")==0){
        //     $table->status=true;
        // }else{
        //     $table->status=false;
        // }
        $table->save();

        return redirect("/partner")->withSuccess("Update successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
        $partner->delete();
        return redirect("/partner")->withSuccess('Deleted');
    }
}
