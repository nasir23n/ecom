<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // private $id;
    public function getCart() {
        $cart = Session::get('cart');
        return $cart ? $cart : [];
    }
    public function store(Request $request) {
        $request->validate([
            'product_id' => 'numeric|required'
        ]);
        $product = Product::find($request->product_id);
        $cart = $this->getCart();
        if (isset($cart[$product->id])) {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "qty" => $cart[$product->id]['qty']+1,
            ];
        } else {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "qty" => 1,
            ];
        }
        Session::put('cart', $cart);

        return 'success';
    }
    public function remove(Request $request) {
        $request->validate([
            'product_id' => 'numeric|required',
        ]);
        $cart = $this->getCart();
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
        }
        Session::put('cart', $cart);
        print_r('removed');
    }
    public function update(Request $request) { 
        $request->validate([
            'id' => 'required',
            'qty' => 'required',
        ]);
        $product = Product::find($request->id);
        $cart = $this->getCart();
        if (isset($cart[$product->id])) {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "qty" => $request->qty,
            ];
        }
        Session::put('cart', $cart);
        print_r('updated');
    }

    public function show() {
        $this->data['cart_item'] = $this->getCart();

        return view('frontend.user.cart', $this->data);
    }
}
