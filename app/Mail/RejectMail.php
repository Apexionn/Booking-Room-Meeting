<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectMail extends Mailable
{

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data=[];
        
    public function __construct($data)
    {
        $this->data=$data;
    }


    public function build(){
        return $this
        ->from('admin@gmail.com')
        ->subject('Your Booking has been rejected')
        ->markdown('mails.reject');
    }
}
