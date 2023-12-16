<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register form Controller
    public function create(){
        return view('users.register'); 
    }

    // create new user controller
    public function store(Request $request)
    {
      $formFields=$request->validate([
        'name'=>['required','min:3'],
        'email'=>['required','email',Rule::unique('users','email')],
         'password'=>'required|confirmed|min:8'
      ]);


    //   hash password
    $formFields['password']=bcrypt($formFields['password']);


    // create user
    $user=User::create($formFields);

    // login (session)
    auth()->login($user);

    // redirecting
 return redirect('/')->with('message','user created and logged in');    

    }

}
