<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    protected $products;

    public function __construct($data, $products)
    {
        $this->data = unserialize($data);
        $this->products = unserialize($products);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order')
        ->with([
            'data' => $this->data,
            'products' => $this->products
        ])
        ->subject('Письмо от сайта NFCPoint');
    }
}
