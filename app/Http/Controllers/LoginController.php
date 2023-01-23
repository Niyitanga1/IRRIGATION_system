<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Http\Controllers\Controller;
use App\Models\users;
use App\Providers\RouteServiceProvider;


use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function login(Request $request){
      $validator= Validator::make($request->all(),[
          'email'=>'required|email',
          'password'=>'required'
         ]);
  
         if ($validator->fails()){
          return redirect('/login');
         }

         if ($validator->validated()){
           $request->validate([
              'email'=>'required',
              'password'=>'required'
           ]);
           $user=User::where('email','=',$request->email)->first();
           
           
          if($user){

              if($request->password==$user->password&& $user->role='admin')  {
  

                  return redirect('/adminportal');
              } 
              else{
                return redirect('/login');

              }
              

          }
         }

        

  
   


  

  
  
   

  }
}