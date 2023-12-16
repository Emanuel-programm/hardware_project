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
        // dd($listing);
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

   return redirect('/')->with('message','Listing created successfuly'); 
        
    }

    // show Edit Form
public function edit(Listing $listing){
    // dd($listing);
return view('listings.edit',[
    'listing'=>$listing
]);
}




// update listing data
public function update(Request $request,Listing $listing)  
{

// dd($request->file('logo'));
// dd($request->all());

$formFiled=$request->validate([
'title'=>'required',
'company'=>['required'],
'location'=>'required',
'website'=>'required',
'email'=>['required','email'],
'tags'=>'required',
'description'=>'required',
'logo'=> 'image'
]);

if($request->hasFile('logo')){
$formFiled['logo']=$request->file('logo')->store('logos','public');
}

$listing->update($formFiled);

return back()->with('message','Listing updated successfuly'); 
    
}

// Delete listing

public function destroy(Listing $listing){
$listing->delete();
return redirect('/')->with('message','Listing deleted suessfuly');
}

}



 