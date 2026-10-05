<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    //
    public function users()
    {
        $data=People::get();
        // print_r($data);
        return view('user',compact('data'));
    }

    
       



}
