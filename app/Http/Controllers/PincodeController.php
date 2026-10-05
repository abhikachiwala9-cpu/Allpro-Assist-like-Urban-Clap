<?php

namespace App\Http\Controllers;

use App\Models\Pincode;
use Illuminate\Http\Request;

class PincodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Pincode::latest()->paginate(7);
        return view('pincode.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pincode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "pincode"=>'required | digits:6 | numeric',
            "locality"=>'required'
        ]);

        $table=new Pincode();
        $table->pincode=$request->pincode;
        $table->locality=$request->locality;
        // if(strcmp($request->status,"on")==0){
        //     $table->status=true;
        // }else{
        //     $table->status=false;
        // }
        $table->save();

        return redirect("/pincode");

    }

    /**
     * Display the specified resource.
     */
    public function show(Pincode $pincode)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pincode $pincode)
    {
        //
        return view('pincode.edit',compact('pincode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pincode $pincode)
    {
        //
        $request->validate([
            "pincode"=>'required | digits:6 | numeric',
            "locality"=>'required'
        ]);

        $table=Pincode::find($pincode->_id);
        $table->pincode=$request->pincode;
        $table->locality=$request->locality;
        // if(strcmp($request->status,"on")==0){
        //     $table->status=true;
        // }else{
        //     $table->status=false;
        // }
        $table->save();

        return redirect("/pincode");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pincode $pincode)
    {
        //
        $pincode->delete();
        return redirect("/pincode")->withSuccess('Deleted');
    }
}
