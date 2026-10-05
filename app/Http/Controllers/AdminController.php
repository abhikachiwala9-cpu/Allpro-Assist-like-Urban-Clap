<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Partner;
use App\Models\People;
use App\Models\Service;
use App\Models\Sub_cat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function open_register()
    {
        return view('register');
    }

    public function open_forget()
    {
        return view('forget');
    }

    public function open_question()
    {
        return view('question');
    }

    public function open_changepass()
    {
        return view('changepass');
    }

    

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        session()->flush();
        return redirect("/");
    }

    public function open_login()
    {

        $user = session()->get('user');
        if (isset($user)) {
            return redirect("home");
        } else {
            return view('login');
        }
    }

    public function Register(Request $request)
    {

        $request->validate([
            "username" => "required | unique:admins",
            "password" => "required | min:6",
            "email" => "required | email | unique:admins",
            "mobileno" => "required | numeric | digits:10",
            "role" => "required",
            "answer" => "required"
        ]);

        $table = new Admin();
        $table->username = $request->username;
        $table->password = $request->password;
        $table->mobileno = $request->mobileno;
        $table->role = $request->role;
        $table->sec_que = $request->sec_que;
        $table->email = $request->email;
        $table->answer = $request->answer;
        $table->save();

        return redirect("/")->withSuccess('Registered Successfully!!!');
    }
    public function login(Request $request)
    {
       
            $request->validate([
                "username" => "required",
                "password" => "required"
            ]);

            $data = Admin::where("username", $request->username)
                ->where("password", $request->password)->first();

            if ($data == null) {
                return redirect("/")->withSuccess('Invalid username or password');
            } else {
                session()->put('user', $data);
                return redirect("/home");
            }
        
    }


    public function forgot_password(Request $request){
        $data=Admin::where('email',$request->email)->first();

        if($data==null){
            return back()->withSuccess("Invalid Email");
        }else{
            return view('question',compact('data'));
        }
    }

    public function questions(Request $request){
        $data=Admin::where('email',$request->email)
        ->where('sec_que',$request->sec_que)
        ->where('answer',$request->answer)->first();

        if($data==null){
            return back()->withSuccess("Invalid Answer");
        }else{
            $email=$request->email;
            return view('changepass',compact('email'));
        }

    }

    

    public function reset_password(Request $request){
        $request->validate([
            "password"=>"required",
            "cpassword"=>"required | same:password"
        ]);

        $table=Admin::where('email',$request->email)->first();
        $table->password=$request->password;
        $table->save();

        return redirect("/")->withSuccess("Reset Password Successfully");

    }

    public function index(Request $request, Admin $admin)
    {
        //
       
            $data=Admin::get();
            return view('admins',compact('data'));
        
    }
    public function edit_admin(Request $request){


        $request->validate([
            "username"=>"required",
            "email" => "required",
            "mobileno" => "required"
        ]);


        $data=Session()->get('user');

        $table=Admin::find($data->_id);
        $table->username=$request->username;
        $table->email = $request->email;
        $table->mobileno = $request->mobileno;
        $table->save();
        session()->put('user',$table);
        return redirect('/home')->withSuccess('Edit Profile successfully');
    }

    public function open_admin()
    {
        return view(('admin'));
    }

    public function open_profile()
    {
        return view(('profile'));
    }

    public function open_changepassword()
    {
        return view(('changepassword'));
    }

    public function changepassword(Request $request)
    {

        $request->validate([
                "opass"=>"required",
                "password"=>"required",
                "rpass"=>"required|same:password"
             ]);

            $data = Session()->get('user');

        $table = Admin::find($data->_id);
        $table->password=$request->password;
        $table->save();
        session()->put('user', $table);
        return redirect('/home')->withSuccess('Password change successfully');
    }
    
    public function count(){
        $category_count=Category::count();
        $partner_count=Partner::count();
        $subcat_count=Sub_cat::count();
        $service_count=Service::count();
        $active_banner=Banner::where('status',true)->count();
        $deactive_banner=Banner::where('status',false)->count();
        $coupon_count=Coupon::count();
        $people_count=People::count();
        $booking_pending=Booking::where('status',0)->count();
        $booking_assign=Booking::where('status',1)->count();
        $booking_confirm=Booking::where('status',2)->count();
        $booking_count=($booking_assign)+($booking_confirm)+($booking_pending);
        $rev=Booking::where('status',2)->sum('tot_amount');
        // $data=Cart::where('status',1)->latest()->paginate(5);
        return view('home',compact('category_count','partner_count','subcat_count','service_count','active_banner','deactive_banner','coupon_count','people_count','booking_pending','booking_assign','booking_confirm','booking_count','rev'));

    }
    // public function showChart()
    // {
    //     $data = [
    //         'labels' => ['Apples', 'Bananas', 'Cherries', 'Dates'],
    //         'data' => [15, 30, 45, 10],
    //         'colors' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
    //     ];

    //     return view('chart', compact('data'));
    // }




}
