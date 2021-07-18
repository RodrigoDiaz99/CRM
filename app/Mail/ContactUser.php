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
    public function __construct($title,$msg,$promo)
    {
        $this->title= $title;
        $this->msg = $msg;
        $this->promo = $promo;
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
        $promo = $this->promo;
     //   $email =$this->email;

        return $this->view('emails.emailuser',compact('msg','title','promo'))->subject($title);
    }
}
