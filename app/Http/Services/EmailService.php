<?php

namespace App\Http\Services;


use App\Models\Email;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function storeEmail(mixed $request){
        return Email::create([
            'first__name' => $request->get('first__name'),
            'last__name' => $request->get('last__name'),
            '__phone' => $request->get('__phone'),
            '__message' => $request->get('__message'),
            '__email' => $request->get('__email'),
            'accepted_at' => now(),
        ]);
    }

    public function sendEmail($email, $files){
        Mail::send('emails.contact-us', $email->getAttributes(), function ($message) use($email, $files) {
            $message->to('support@afrfinity.com')
                ->from('online@m-afrika.co.za')
                ->subject('Contact Form Online');
            if($files){
                Arr::map($files, function($file) use($message){
                    $message->attach($file);
                });
            }

        });
    }
}