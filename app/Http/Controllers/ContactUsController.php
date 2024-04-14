<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function submitContactMessage(Request $request)
    {
        $validatedData =  $request->validate([
            'email' => 'required|email',
            'service' => 'required|string|max:255',
            'message' => 'required|string',
        ]);


        Mail::send('frontend.mail.contact_us', ['data' => $validatedData], function ($message) use ($validatedData) {
            $message->to("ssahed65@gmail.com")
                ->subject('Contact Us Message');
        });


        return response()->json(['success' => 'Your message has been sent successfully!']);
    }
}
