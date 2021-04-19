<?php

namespace App\Http\Controllers\Frontend;

use DB;
use Cart;
use Exception;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{

    public function renderPage()
    {
        if (Cart::getContent()->count() > 0) {
            $CartItems = Cart::getContent();
            return view('Site.Shipping', compact('CartItems'));
        }
        return redirect()->route('products');
    }

    public function ShippingStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:4',
            'last_name'  => 'required|min:3',
            'address'    => 'required|min:4',
            'phone'      => 'required|min:11|max:11'
        ]);
        try {
            $shipping = Shipping::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'phone'      => $request->phone,
                'address'    => $request->address
            ]);
            Session::put('shipping_id', $shipping->id);
            return redirect()->route('checkout.reviews_payments');
        } catch (Exception $exception) {

        }

    }
}
