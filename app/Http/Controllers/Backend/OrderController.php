<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('backend.order.index', compact('orders'));
    }

    public function show(Order $order) {
        return view('backend.order.show', compact('order'));
    }
    public function confirm(Order $order) {
        $order->update([
            'delivery_status' => 1,
        ]);
        return back()->with('success', 'Order Done');
    }
}
