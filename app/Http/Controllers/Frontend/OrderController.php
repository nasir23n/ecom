<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index() {
        $this->data['cart_item'] = Session::get('cart');
        return view('frontend.pages.confirm_order', $this->data);
    }
    public function show() {
        $this->data['orders'] = Auth::user()
                                        ->order()
                                        // ->leftJoin('products as p', 'p.id', '=', 'orders.product_id')
                                        ->get();
                                        // dd($this->data);
        return view('frontend.user.order', $this->data);
    }
    public function order_edit(Order $order) {
        return $order;
    }
    public function checkout(Request $request) {
        // terms_and_condition
        $request->validate([
            'terms_and_condition'=> 'required',
            'payment_method' => 'required',
            'delivery_method' => 'required',
        ]);
        if (Auth::check()) {
            $cart = Session::get('cart');
            
            $user_id = Auth::user()->id;
            DB::beginTransaction();
            $total = 0;
            $data = [
                'user_id' => $user_id,
                'payment_method' => $request->payment_method,
                'delivery_method' => $request->delivery_method,
                'delivery_status' => 0,
                'total' => 0,
            ];
            $order = Order::create($data);
            foreach ($cart as $item) {
                $order->details()->create([
                    'product_name' => $item['name'],
                    'product_id' => $item['id'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                ]);
                $total += $item['price'] * $item['qty'];
                unset($cart[$item['id']]);
            }
            $order->update([
                'total' => $total,
            ]);
            DB::commit();
            Session::put('cart', $cart);
            return redirect()->route('order');
        } else {
            return redirect('/');
        }
    }
}
