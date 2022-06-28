<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $this->data['catagories'] = Category::orderBy('created_at', 'DESC')->get();
        $this->data['products'] = Product::where('is_active', 1)->orderBy('created_at', 'DESC')->paginate(20);
        return view('frontend.pages.home', $this->data);
    }
}
