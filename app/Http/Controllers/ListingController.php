<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    
//  show all listing
    public function index(){
        // dd(request()->tag);
        return view('Listings.index',[
            'listings'=>Listing::latest()->fliter(request(['tag','search']))->get()
    ]);
}

    // show individual listing
    public function show(Listing $listing){
        return view('listings.show',
        [
        'listing'=>$listing
        ]
        );  
    }
}
 