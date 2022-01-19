<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $this->data['cart_item'] = Auth::user()
                                        ->carts()
                                        ->leftJoin('products as p', 'p.id', '=', 'carts.product_id')
                                        ->get([
                                            'carts.*',
                                            'carts.quantity as cart_quantity',
                                            'carts.id as cart_id',
                                            'p.*'
                                        ]);
        return view('frontend.pages.confirm_order', $this->data);
    }
    public function show() {
        $this->data['orders'] = Auth::user()
                                        ->order()
                                        ->leftJoin('products as p', 'p.id', '=', 'orders.product_id')
                                        ->get([
                                            'orders.*',
                                            'p.image',
                                        ]);
// dd($this->data['orders']);
        return view('frontend.pages.show_order', $this->data);
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
            $cart = Auth::user()
                                        ->carts()
                                        ->leftJoin('products as p', 'p.id', '=', 'carts.product_id')
                                        ->get([
                                            'carts.*',
                                            'carts.quantity as cart_quantity',
                                            'carts.id as cart_id',
                                            'p.*'
                                        ]);
            
            $user_id = Auth::user()->id;
            foreach ($cart as $item) {
                $data = [
                    'user_id' => $user_id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->name,
                    'payment_method' => $request->payment_method,
                    'delivery_method' => $request->delivery_method,
                    'price' => $item->regular_price,
                    'quantity' => $item->cart_quantity,
                ];
                Cart::where([
                    'user_id' => $user_id,
                    'product_id' => $item->product_id,
                ])->delete();
                Order::create($data);
            }
            // dd($info);
            // Auth::user()->order()->create($info);
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
}
