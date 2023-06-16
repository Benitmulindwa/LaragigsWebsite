<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

Route::get('/',[ListingController::class,'index']);

Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

Route::post('/listings',[ListingController::class,'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

Route::get('/listings/{listing}',[ListingController::class,'show']);

//Show Register
Route::get('/register',[UserController::class,'register'])->middleware('guest');

//Create new user
Route::post('/users',[UserController::class,'store'])->middleware('auth');

//Log the user out
Route::post('/logout',[UserController::class,'logout']);


//Show the Login In form user
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Log the user In
Route::post('/users/authenticate',[UserController::class,'authenticate']);

