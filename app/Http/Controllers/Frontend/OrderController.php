<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $Orders = Order::with(['customer', 'shipping', 'order_info', 'payment'])->select('id', 'customer_id', 'shipping_id', 'total', 'status')->latest('id')->get();
        //return OrderInfo::with('product')->get();
        return view('staff.order.index', compact('Orders'));
    }

    public function details($id)
    {
        $id         = base64_decode($id);
        $order      = Order::with(['customer', 'shipping', 'order_info', 'payment'])->findOrFail($id);
        $order_info = OrderInfo::with('product')->where('order_id', $id)->get();
        return view('staff.order.details', compact('order'));
    }


    public function status(Request $request)
    {
        if ($request->ajax()) {
            $order         = Order::find($request->id);
            $order->status = $request->status;
            if ($order->save()) {
                return response()->json(['status' => 200]);
            }
        }
    }

    public function py_status(Request $request)
    {
        if ($request->ajax()) {
            $order         = Payment::find($request->id);
            $order->status = $request->status;
            if ($order->save()) {
                return response()->json(['status' => 200]);
            }
        }
    }

    public function shipping_charge(Request $request)
    {
        return $request->all();
    }
}
