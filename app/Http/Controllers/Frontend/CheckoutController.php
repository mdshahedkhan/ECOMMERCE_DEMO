<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Shipping;
use Cart;
use DB;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CheckoutController extends Controller
{
    public function __construct()
    {

    }

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
            $exception = DB::transaction(function () use ($request) {
                Shipping::create([
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'phone'      => $request->phone,
                    'address'    => $request->address
                ]);
            });
            if (is_null($exception)) {
                return "Success";
            } else {
                throw new Exception();
            }
        } catch (Exception $ex) {

        }

    }
}
