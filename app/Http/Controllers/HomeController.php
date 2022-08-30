<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Course;
use App\Models\Komentar;
use App\Models\Promo;
use App\Models\Say;
use App\Models\Team;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){

       // Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-B97DFKynn3iOOPK1Y9CCSl2q';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
 
$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 10000,
    ),
    'customer_details' => array(
        'first_name' => 'budi',
        'last_name' => 'pratama',
        'email' => 'budi.pra@example.com',
        'phone' => '08111222333',
    ),
);
 
$snapToken = \Midtrans\Snap::getSnapToken($params);
 
        return view('tampilan.home',[
            'title' => 'Home',
            'active' => "active",
            'promo' => Promo::latest()->get(),
            'branch' => Branch::latest()->get(),
            'course' => Course::latest()->get(),
            'teams' => Team::latest()->get(),
            'payment' => $snapToken,
            'say' => Say::latest()->get(),
            'komentar' => Komentar::latest()->get()
        ]);
    }

    public function show(Promo $slug){
        return view('tampilan.detailPromo',[
            'title' => 'detailPromo',
            'promo' => $slug
        ]);
    }

    public function showCourse(Course $detail){
        return view('tampilan.detailCourse',[
            'title' => 'Detail Course',
            'ces' => $detail
        ]);
    }


}
