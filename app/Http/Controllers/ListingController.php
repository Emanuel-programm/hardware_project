<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    
//  show all listing
    public function index(){
        // dd(request()->tag);
        return view('Listings.index',[
            'listings'=>Listing::latest()->fliter(request(['tag','search']))->paginate(2)
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
// show create form
    public function create(){
return view('listings.create');
    }


    // store listing data
    public function store(Request $request)  
    {

    // dd($request->file('logo'));
   // dd($request->all());

   $formFiled=$request->validate([
 'title'=>'required',
  'company'=>['required',Rule::unique('listings','company')],
   'location'=>'required',
   'website'=>'required',
    'email'=>['required','email'],
    'tags'=>'required',
    'description'=>'required',
    'logo'=> 'required|image'
   ]);

   if($request->hasFile('logo')){
    $formFiled['logo']=$request->file('logo')->store('logos','public');
   }

   Listing::create($formFiled);

   return redirect('/')->with('message','Listing created successful');
        
    }
}



 