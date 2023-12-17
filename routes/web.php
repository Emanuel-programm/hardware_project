<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// All listing
Route::get('/',[ListingController::class,'index']);


// show create form
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth'); 

// store listing data in database
Route::post('/listings',[ListingController::class,'store'])->middleware('auth');

// show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');


// Single listing (route model binding)
Route::get('/listings/{listing}',[ListingController::class,'show']); 

// Show register /create user form
Route::get('/register',[UserController::class,'create'])->middleware('guest');


// create new user
Route::post('users',[UserController::class,'store']);

// Log user out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

// show login form
Route::get('login',[UserController::class,'login'])->name('login')->middleware('guest');

// loged in user
Route::post('/users/authenticate',[UserController::class,'authenticate']);
 










