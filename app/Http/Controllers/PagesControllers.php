<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use App\Post;
use Illuminate\Http\Request;


class PagesControllers extends Controller {

    public function getIndex() {

        $posts = Post::orderBy('created_at' , 'desc')->limit(7)->get();

        return view('pages.welcome' , compact('posts'));
    }

    public function getAbout() {


        return view('pages.about');
    }

    public function getContact() {

        return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, array(

            'email'   => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:5'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );
        Mail::send('email.contact', $data, function($message) use($data) {

            $message->from($data['email']);
            $message->to('9477b8e929-45eaf1@inbox.mailtrap.io');
            $message->subject($data['subject']);
        });

        Session::flash('Succcess' , 'Your Message Was Sent!');

        return view('pages.contact');
    }


}
