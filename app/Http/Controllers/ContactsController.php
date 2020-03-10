<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactsController extends Controller
{
        public function sendMessage(Request $request){
        $this->validate($request,[
            'full_name' => 'required',
            'email' =>'required',
            'phone' => 'required','number',
            'reason' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reason' => $request->reason,
            'bodyMessage' => $request->message
        ];
        Mail::send('dynamic_email_template',$data,function($message) use ($data){
            
            $message->from($data['email'],$data['full_name']);
            $message->sender($data['email'],$data['full_name']);
            $message->to('rupesh.shrestha@escpl.com.np','Rupesh Shrestha');
            $message->subject($data['reason']);
        });
        return redirect('/contact')->with('success','Send Successfully');
    }

}
