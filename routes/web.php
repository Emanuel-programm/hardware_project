<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

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



Route::get('/', function () {
    return view('Listings',[
        'heading'=>'Latest Listings',
        'listings'=>Listing::all()
]);
});

// Single listing
Route::get('/listings/{id}',function($id){

    return view('listing',
    [
    'listing'=>Listing::find($id)

    ]
    );
}); 


// Route::get('/return',function(){
//     return view('listing');
// });


