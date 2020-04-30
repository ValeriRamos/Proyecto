<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Cart;
use PDF;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cart;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Cart $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
       
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()

    {
        $cart =Cart::orderBy('id','desc')->first();        
        return $this->view('emails.new-order')->subject('Factura')->attach(public_path().'/pdf/'.$cart->id.'.pdf');
       
    }
}