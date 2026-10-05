<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Partner;
use App\Models\People;
use App\Models\Pincode;
use App\Models\Service;
use App\Models\Sub_cat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function register_user(Request $request){
        if(isset($request->username) && 
            isset($request->email) &&
            isset($request->password) &&
            isset($request->mobileno)){
                $table = new People();
                $table->username = $request->username;
                $table->email = $request->email;
                $table->password = $request->password;
                $table->mobileno = $request->mobileno;
                $table->address = $request->address;
                $table->save();
                return[
                    'status' => 'true',
                    'message' => 'User Register!!',
                    'people'=>$table
                ];
            }else{
                return[
                    'status' => 'false',
                    'message' => 'Insufficient Parameter',
                    'people'=>null
                ];
            }
    }

    public function getData(){
        $banner_data = Banner::where('status', true)->get();
        $category_data = Category::get();
        $coupon_data = Coupon::where('status', true)->get();
        $subcat_data = Sub_cat::get();
        $service_data = Service::get();
        $pincode_data = Pincode::get();



        return [
            "status" => true,
            "message" => "Data Get Success",
            "banner_data" => $banner_data,
            "category_data" => $category_data,
            "coupon_data" => $coupon_data,
            "subcat_data" => $subcat_data,
            "service_data" => $service_data,
            "pincode_data"=> $pincode_data,
        ];
    }

    public function login_user(Request $request){
        if(isset($request->email) &&
            isset($request->password)){
                $table = People::where('email',$request->email)->where('password',$request->password)->first();
                if(isset($table)){
                return[
                    'status' => true,
                    'message' => 'User found!!',
                    'people'=>$table
                ];
                }else{
                    return[
                        'status' => false,
                        'message' => 'User not found!!',
                        'people'=>null
                    ];
                
                }
            }else{
                return[
                    'status' => false,
                    'message' => 'Insufficient Parameter',
                    'people'=>null
                ];
            }
    }
    
    public function login_partner(Request $request){
        if(isset($request->partner_mob)){
                $table = Partner::where('partner_mob',$request->partner_mob)->first();
                if(isset($table)){
                return[
                    'status' => true,
                    'message' => 'User found!!',
                    'partner'=>$table
                ];
                }else{
                    return[
                        'status' => false,
                        'message' => 'User not found!!',
                        'partner'=>null
                    ];
                
                }
            }else{
                return[
                    'status' => false,
                    'message' => 'Insufficient Parameter',
                    'partner'=>null
                ];
            }
    }

    public function addbooking(Request $request){

        $data=Booking::where("uid",$request->uid)
                ->where("pid",$request->pid)
                ->where("status",0)->first();
        if($data==null){
            $table = new Booking();
            $table->uid = $request->uid;
            $table->pid = $request->pid;
            $service=Service::find($request->pid);
            $table->pname = $service->sr_name;
            $table->pic1 = $service->sr_pic1;
            $table->amount=(int)$service->sr_price;
            $table->tot_amount=(int)$service->sr_price;
            $table->c_discount=(int)$service->c_discount;
            $table->time=$request->time;
            $table->date=$request->date;
            $table->status=0;
            $table->c_o=$request->c_o;
            $table->c_code=$request->c_code;
            $table->address="none";
            $table->partner_id="none";
            $table->partner_name="none";
            $table->partner_pic="none";
            $table->partner_mobileno="none";
            $table->save();

            
            
        }
        $bookings=Booking::where("uid",$request->uid)
                ->where("status",0)->get();
        return[
            "status"=>true,
            "message"=>"Booking Done",
            "booking"=>array($bookings)
        ];

    }
    
    public function getbooking(Request $request){
        $data=Booking::where("uid",$request->uid)
        ->where("status",(int)$request->status)->get();

        return[
            "status"=>true,
            "message"=>"Booking Get Successfully!!",
            "booking"=>$data
        ];
    }
    public function removebooking(Request $request){
        Booking::where('id',$request->id)->delete();

        $data=Booking::where('uid',$request->uid)
        ->where("status",(int)$request->status)->get();
        return [
            "status"=>true,
            "message"=>"Booking Get!!",
            "booking"=>$data
        ];
        
        return [
            "status"=>true,
            "message"=>"Booking Get!!",
            "booking"=>$data
        ];
    }

    public function confirmOrder(Request $request)  {
        $uid=$request->uid;
        $time = Carbon::now()->format('H:i');
        $date = Carbon::now()->format('d/m/Y'); 

         $data=Booking::where('uid',$uid)
        ->where('status',0)->get();
        foreach($data as $item){
            $item->status=1;
            $item->address=$request->address;
            $item->c_code=$request->c_code;
            $item->c_o=$request->c_o;
            $item->time=$time;
            $item->date=$date;
            $item->c_discount=$request->c_discount;
            $item->save();
        } 
        $data=Booking::where('uid',$uid)
        ->where('status',0)->get(); 
        return [
            "status"=>true,
            "message"=>"Order placed successfully",
            "order"=>$data
        ];
    }

    public function getCouponFromCode(Request $request) {
        if(isset($request->code)) {
            $table = coupon::where('c_code',$request->code)->first(); 

            if(isset($table)) {
                return [
                    'status' => true,
                    'message' => 'Coupon Applyed',
                    'coupon_data' => $table
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Invalid Coupon Code',
                    'coupon_data' => null
                ];
            }
        } else {
            return [
                'status' => false,
                'message' => 'Insufficient parameters',
                'coupon_data' => null
            ];
        }
    }

    public function getOrderhistory(Request $request) {

        $data=Booking::where('uid',$request->uid)
        ->where('status','>',(int)$request->status)->get();
        return [
            "status"=>true,
            "message"=>"getting cart",
            "order"=>$data
        ];
    }
}
