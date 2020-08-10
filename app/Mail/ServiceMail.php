<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $from_name;
    
    public $from_email;
    
    public $subject;
    
    public $name;
    
    public $content;
    
    public $header;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_name, $from_email, $subject, $name, $header, $content)
    {
        $this->from_name = $from_name;
        $this->from_email = $from_email;
        $this->subject = $subject;
        $this->name = $name;
        $this->content = $content;
        $this->header = $header;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->from_email, $this->from_name)
        ->view('emails.service')
        ->subject($this->subject);
    }
}
