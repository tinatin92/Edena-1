<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($email)
    {

        $this->email = $email;
    }

    public function build()
    {

        $unsubscribe = url('en/unsubscribe').'?email='.$this->email['email'];

        return $this->view('admin.mail.index')->with([

            'unsubscribe' => $unsubscribe,
        ]);

    }
}
