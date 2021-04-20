<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $Orders = Order::with('customer', 'shipping', 'order_items', 'payment')->select('id', 'customer_id', 'shipping_id', 'total', 'status')->latest('id')->get();
        return view('staff.index', compact('Orders'));
    }
}
