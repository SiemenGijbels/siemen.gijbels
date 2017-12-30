<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/30/17
 * Time: 1:08 PM
 */

//https://www.cloudways.com/blog/laravel-contact-form/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUS;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        return view('content.about');
    }

    public function contactUsPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        ContactUS::create($request->all());

        Mail::send('email.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('contact@laravelblog.com', 'Contact Request');
                $message->to('no-reply@ehb.be', 'Siemen Gijbels')->subject('Someone tried to contact you!');
            });

        return back()->with('success', 'Thanks for contacting us!');
    }
}