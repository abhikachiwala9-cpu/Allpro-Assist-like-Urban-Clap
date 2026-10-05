<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubCatController;
use App\Models\Admin;
use App\Models\People;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return view('home');
// });
Route::resource("/category",CategoryController::class);
Route::resource("/banner",BannerController::class);
Route::resource("/coupon",CouponController::class);
Route::resource("/partner",PartnerController::class);
Route::resource("/pincode",PincodeController::class);
Route::resource("/sub_cat",SubCatController::class);
Route::resource("/service",ServiceController::class);

Route::get('/home',[AdminController::class,'count']);


Route::get('/register',[AdminController::class,'open_register']);
Route::get('/forget',[AdminController::class,'open_forget']);
Route::get('/changepass',[AdminController::class,'open_changepass']);
Route::get('/question',[AdminController::class,'open_question']);
Route::get('/',[AdminController::class,'open_login']);
// Route::get('/home',[AdminController::class,'home']);
Route::get('/logout',[AdminController::class,'logout']);
Route::post('/register_user',[AdminController::class,'Register']);
Route::post('/login',[AdminController::class,'login']);

Route::post('/forgot_password',[AdminController::class,'forgot_password']);
Route::post('/questions',[AdminController::class,'questions']);
Route::post('/reset_password',[AdminController::class,'reset_password']);

Route::post('/edit_admin', [AdminController::class, 'edit_admin']);
Route::get('/admin', [AdminController::class, 'open_admin']);
Route::get('/profile', [AdminController::class, 'open_profile']);

Route::get('/open_changepassword', [AdminController::class, 'open_changepassword']);
Route::post('/changepassword', [AdminController::class, 'changepassword']);



Route::post('/api_register',[ApiController::class,'register_user']);
Route::post('/api_login',[ApiController::class,'login_user']);
Route::get('/api_data', [ApiController::class, 'getData']);
Route::post('/api_addbooking', [ApiController::class, 'addbooking']);
Route::post('/api_getbooking', [ApiController::class, 'getbooking']);
Route::post("/api_loginpartner", [ApiController::class, 'login_partner']);
Route::post('/api_applycoupon',[ApiController::class,'getCouponFromCode']);
Route::post('/api_removebooking',[ApiController::class,'removebooking']);
Route::post('/api_confirmorder',[ApiController::class,'confirmOrder']);
Route::post('/api_getOrderhistory',[ApiController::class,'getOrderhistory']);


Route::get('/user',[PeopleController::class,'users']);


Route::get('/admin',[AdminController::class,'index']);
Route::get('/booking',[BookingController::class,'booking']);

