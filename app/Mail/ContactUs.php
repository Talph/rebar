<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    public $files;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $files)
    {
        //
        $this->data = $data;
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Contact Form Online')
        ->to('support@afrfinity.com')
        ->from('online@m-afrika.co.za')
        ->view('emails.contact-us')
        ->with(['data', $this->data, 'files', $this->files]);
    }
}
