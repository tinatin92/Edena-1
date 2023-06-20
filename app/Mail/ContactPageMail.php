<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactPageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data2;

    public function __construct($data2)
    {

        $this->data2 = $data2;

        $this->subject('Stateless.ge');
    }

    public function build()
    {
        return $this->view('admin.mail.contactpagemail')->with([
            'data2' => $this->data2,
        ]);
    }
}
