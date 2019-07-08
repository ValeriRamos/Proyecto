<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;
use PDF;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function export_pdf(){
        
        $pdf = PDF::loadView('emails.test');
        return $pdf->download('factura.pdf');

    }

    public function update(){

        $client = auth()->user();
        $cart = $client->cart;
        $cart->status ='Pending';
        $cart->order_date = Carbon::now();
       

        $cart->save();//update
        $id = \Auth::user()->id;


        $admins = User::where('admin',false)
        ->where('id', $id)->get();


        $data['cart'] = $cart;
        $data['user'] = $client;

        //var_dump( $cart );return;
        //return view('emails.test', $data);

        
       // $pdf->download('hola.pdf');

     

            $cart =Cart::orderBy('id','desc')->first();
            $pdf = PDF::loadView('emails.new-order', $data );
            $pdf->save(public_path().'/pdf/'.$cart->id.'.pdf');

            Mail::to($admins)->send(new NewOrder($client, $cart));

        $notification ='pedido registrado correctamente. Email';
        return back()->with(compact('notification'));
       
    }
}
