<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;



class ChatController extends Controller
{
    //


    public function index()
    {







        return view('upload');


    }
    public function store(Request $request)
    {


        $image=$request->file('upload');
        

       

        $imageName = $image->getClientOriginalName();
$image->move('../Chatme-front/public/images', $imageName);

//  $fileName = time().'.'.$extenstion;
//             $file->move('uploads/students/', $filename);

$user=User::find(request('id'));
$user->profile_picture=$imageName;
$user->update();



return response (compact('user'));


    }


    public function chat(Request $request)
    {


        $email=request('email');
        $chats=Chat::where('sender_email',request('email'))->orWhere('receiver_email',request('email'))->get();
        
        $users=User::all();
       
        


return response(compact('chats','users'));



        echo $chats;
       








    }

    public function all(Request $request)
    {


        $user=User::all();




return response(compact('user'));
         echo $user;





    }


    public function send (Request $request)
    {

        $chat=new Chat; 
        $chat->sender_email=request('sender_email');
       

        $chat->receiver_email=request('receiver_email');
        $chat->content=request('content');

       
        $chat->save();


// ddd






        return response(compact('chat'));
    }


    public function current(Request $request)
    {


        $chat=User::where("email");





        return response(compact('chat'));
    }

}
