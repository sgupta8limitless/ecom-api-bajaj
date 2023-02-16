<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// user routes 


Route::resource('/users',UserController::class);
Route::post("/users/login",[UserController::class,'login']);
Route::get("/cart/{id}",[UserProductController::class,'userProducts']);
Route::post('/cart/add',[UserProductController::class,'store']);
Route::put("/cart/update/{id}",[UserProductController::class,'update']);

// Category routes 
Route::resource('/categories',CategoryController::class);
// product routes 
Route::resource("/products",ProductController::class);


// Route::middleware('auth:sanctum')->get("/users/something",[UserController::class,"justKidding"]);

