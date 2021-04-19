<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShippingController extends Controller
{
    public function review_payments()
    {
        if (Session::get('shipping_id')) {
            return view('Site.payments.review_payments');
        }
    }
}
