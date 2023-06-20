<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactPageMailfonradmin extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;

    public function __construct($submission)
    {
        $this->submission = $submission;

        $this->subject('New Form Submit From Contact Page');
    }

    public function build()
    {
        return $this->view('admin.mail.contactpagemailforadmin')->with([
            'submission' => $this->submission,
        ]);
    }
}
