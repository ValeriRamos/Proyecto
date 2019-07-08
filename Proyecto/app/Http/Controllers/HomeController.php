<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }


    public function qrcode(){
        
        \QrCode::size(500)
        ->format('png')
        ->generate('ItSolutionStuff.com', public_path('pdf/qrcode.png'));

        $base64 = base64_encode(\QrCode::format('png')->size(100)->generate('Make me into an QrCode!'));

        $data['base64'] = $base64;
        return view('emails.qrcode', $data );
    }


}
