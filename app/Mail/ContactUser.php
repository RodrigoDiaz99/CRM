<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$msg)
    {
        $this->title= $title;
        $this->msg = $msg;
        //$this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title =$this->title;
        $msg = $this->msg;
     //   $email =$this->email;

        return $this->view('emails.emailuser',compact('msg','title'))->subject($title);
    }
}
