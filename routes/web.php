<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Route;
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
Route::get('/listings/create',[ListingController::class,'create']); 

// store listing data in database
Route::post('/listings',[ListingController::class,'store']); 

// show Edit Form
Route::get('listings/{listing}/edit',[ListingController::class,'edit']);

// Single listing (route model binding)
Route::get('/listings/{listing}',[ListingController::class,'show']); 


// Route::get('/return',function(){
//     return view('listing');
// });


