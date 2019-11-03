<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $content;
    public function __construct($content,$subject)
    {
    
      $this->content=$content;
      $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = $this->content;
        $subject = $this->subject;
        return $this->from('duynhph06925@fpt.edu.vn','ShopMen')->view('auth.email.email',compact('content'))->subject($subject);
        // ->with([
                        
        //                 'content' => $this->content,
        //             ]);
    }
}
