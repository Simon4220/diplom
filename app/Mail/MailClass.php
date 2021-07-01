<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $phone;
    protected $email;
    protected $text;
    
    public function __construct($name, $phone, $email, $text)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->text = $text;
    }
    
    public function build()
    {
        return $this->view('mail.mail')
        ->with([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'text' => $this->text,
        ])
        ->subject('Письмо от пользователя сайта NFC-Point');
    }
}
