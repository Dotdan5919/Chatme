<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //


public function index()
{

    $check_User=new User;

        if($check_User->where('email','=',request('email'))->exists()) 
        {

            return response("Account exists");

        }
else{ 

     $_user=new User();

     $_user->name=request('name');
     $_user->email=request('email');
     $_user->profile_picture="avatar.jpg";

     $_user->description="";

     $_user->phone_no="";


    //  $token=$_user->createToken('main')->plainTextToken;
     $_user->password=Hash::make(request('password'));




     $_user->save();

     $user = User::where('email', request('email'))->first();
     // dd($user);
  $token=$user->createToken('main')->plainTextToken;


    return  response(compact('user','token'));
}
}
public function signin()
{

        // User::findOrFail(request('email'));

     $_user=new User();
     

     if($_user->where('email',"=",request('email'))->exists()){
     

$pwd=$_user->where('email',"=",request('email'))->get();

if(Hash::check(request('password'), $pwd[0]->password)){  
    
    $user = User::where('email', request('email'))->first();
    // dd($user);
 $token=$user->createToken('main')->plainTextToken;
//  $token->tokenable_id = $_user->id; 


    return  response(compact('user','token'));

}

else{

    return response("Wrong Password");

}
    
    }
    else{


        return response("incorrect details");
    }
   

    return  response([request('name')]);

}


public function signout(Request $request)
{


    $user=User::where('email','=',request('email'))->first();
    // $user = $request->user();

    $user->currentAccessToken()->delete();

   


    
    return  response('',204);
}


public function update(Request $request)
{


if(request('name'))

{ 
$user=User::find(request('id'));

$user->name=request('name');

$user->update();
}
else if( request('phone_no') )
{

    $user=User::find(request('id'));

    $user->phone_no=request('phone_no');
    
    $user->update();


}
else if( request('description') )
{

    $user=User::find(request('id'));

    $user->description=request('description');
    
    $user->update();


}







return response (compact('user'));


}


}
