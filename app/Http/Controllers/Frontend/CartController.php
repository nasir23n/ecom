<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    private $id;
    public function store(Request $request) {
        $request->validate([
            'product_id' => 'numeric|required'
        ]);
        if (Auth::check()) {
            $cart_item = Cart::where('product_id', $request->product_id)->get();
        
            if (count($cart_item) == 0) {
                Cart::create([
                    'product_id' => $request->product_id,
                    'user_id' => $request->user()->id,
                    'quantity' => 1,
                ]);
            }
            print_r('success');
        } else {
            return response()->json(['message' => 'You are not logged in'], 401);
        }
    }
    public function remove(Request $request) {
        $request->validate([
            'product_id' => 'numeric|required',
        ]);
        $cart = Auth::user()->carts()->where('product_id', $request->product_id)->first();
        $cart->delete();
        print_r('removed');
    }
    public function update(Request $request) { 
        $request->validate([
            'id' => 'required',
            'qty' => 'required',
        ]);
        Cart::where('id', $request->id)->update([
            'quantity' => $request->qty,
        ]);
        print_r('updated');
    }

    public function show() {
        $this->data['cart_item'] = [];
        if (Auth::check()) {
            $this->data['cart_item'] = Auth::user()
                                            ->carts()
                                            ->leftJoin('products as p', 'p.id', '=', 'carts.product_id')
                                            ->get([
                                                'carts.*',
                                                'carts.quantity as cart_quantity',
                                                'carts.id as cart_id',
                                                'p.*'
                                            ]);
        }
        return view('frontend.user.cart', $this->data);
    }
}
