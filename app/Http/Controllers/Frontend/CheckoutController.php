<?php

namespace App\Http\Controllers\Frontend;

use DB;
use Cart;
use Exception;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\OrderInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function renderPage()
    {
        if (Session::get('customer')) {
            if (Cart::getContent()->count() > 0) {
                $CartItems = Cart::getContent();
                return view('Site.Shipping', compact('CartItems'));
            }
        } else {
            return redirect()->route('auth.login');
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
            return $exception;
        }

    }

    public function Order_New(Request $request)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);
        $exception = DB::transaction(function () use ($request) {

            $order = Order::create([
                'customer_id' => Session::get('customer'),
                'shipping_id' => Session::get('shipping_id'),
                'total'       => Cart::getSubTotal(),
                'status'      => 'pending'
            ]);

            foreach (Cart::getContent() as $item) {
                OrderInfo::create([
                    'order_id'      => $order->id,
                    'product_id'    => $item->id,
                    'product_name'  => $item->name,
                    'product_price' => $item->price,
                    'product_qty'   => $item->quantity
                ]);
            }
            $Payment = Payment::create([
                'order_id' => $order->id,
                'type'     => $request->type,
            ]);
            Cart::clear();
            Session::flash('order_success', 'Success');
        });
        if (is_null($exception)) {
            return redirect()->route('checkout.order_success');
        }

    }

    public function Order_success()
    {
        if (Session::get('order_success')) {
            return view('Site.payments.Success');
        } else {
            return redirect()->back();
        }
    }
}
