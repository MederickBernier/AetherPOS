<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function send(Request $request){
        // Validate the request datas
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Verify reCAPTCHA
        $recaptchaSecret = '6LcaDYooAAAAACnrjuetViOU0i3qL6tsRkBK0CsZ';
        $recaptchaResponse = $request->input('g-recaptcha-response');

        $response = Http::post("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");

        if (!$response->json()['success']) {
            return redirect()->back()->withErrors(['captcha' => 'reCAPTCHA verification failed. Please try again.']);
        }

        // Send the email
        try{
            Mail::to('mederick.bernier@hotmail.ca')->send(new ContactFormMailable($data));
            return redirect()->back()->with('success','Your message has been sent successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Failed to send the message, please try again later.');
        }
    }
}
