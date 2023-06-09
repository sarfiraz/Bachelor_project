<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function submit(Request $request, $webId,$userId)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $SenderPerson = $validatedData['name'];

        $user = User::findOrFail($userId);
        $recipient = $user->email;
        $subject = 'New message from ' . $validatedData['name'];
        $sender = $validatedData['email'];
        $content = $validatedData['message'];

            $contact = new Contact();
            $contact->website_id = $webId;
            $contact->name = $validatedData['name'];
            $contact->email = $sender;
            $contact->message = $content;
            $contact->save();
        Mail::html($content, function ($message) use ($recipient, $subject, $sender) {
            $message->to($recipient)->subject($subject)->from($sender);
        });
        return view('contact',compact('SenderPerson'));
    }

    public function show(){

    }
}
