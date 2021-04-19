<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShippingController extends Controller
{
    public function review_payments()
    {
        if (Session::get('shipping_id')) {
            $id = Session::get('shipping_id');
            if (Session::get('shipping_id')) $info = Shipping::findOrFail($id);
            else
                $info = "";
            return view('Site.payments.review_payments', compact('info'));
        }
        return redirect()->route('home');
    }
}
