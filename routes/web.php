<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::get("/login",[UserController::class,'login']);
Route::get("/register",[UserController::class,'register']);
Route::post("/login",[UserController::class,'loginUser'])->name('login-user');
Route::post("/register-user",[UserController::class,'registerUser'])->name('register-user');
Route::get('/listUser',[UserController::class,'index']);

Route::get('/addCategory',[CategoryController::class,'addCategory']);
Route::get('/addProduct',[CategoryController::class,'index']);
Route::post('/addProduct',[ProductController::class,'store']);
Route::get('/',[ProductController::class,'index'])->name('home');;
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);

Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);
Route::get("ordernow",[ProductController::class,'orderNow']);
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
// Route::get("/",[CategoryController::class,'category']);


Route::get('/admin/home',[App\Http\Controllers\UserController::class,'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get("/create",[FileController::class,'create']);
Route::post("/",[UserController::class,'store']);
Route::get("/edit/{id}",[UserController::class,'edit'])->name('file.edit');
Route::post("/edit",[UserController::class,'update']);
