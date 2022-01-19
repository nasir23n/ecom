<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// 001d38
class HomeController extends Controller
{
    public function index() {
        $this->data['catagories'] = Catagory::orderBy('created_at', 'DESC')->get();
        $this->data['products'] = Product::where('is_active', 1)->orderBy('created_at', 'DESC')->paginate(20);
        $this->data['cart_item'] = [];
        return view('frontend.pages.home', $this->data);
    }
}
