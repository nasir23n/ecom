<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index(Product $product) {
        $related_product = Product::where('category_id', $product->category_id)->limit(5)->get();
        $this->data['product'] = $product;
        $this->data['related_product'] = $related_product;
        
        return view('frontend.pages.product_details', $this->data);
    }
    public function search(Request $request) {
        $request->validate([
            'search' => 'required'
        ]);
        $param = $request->search;
        // Product::where('name', '')
        $result = Product::where('name', 'LIKE', "%$param%")->get();
        return $result;
    }
}
