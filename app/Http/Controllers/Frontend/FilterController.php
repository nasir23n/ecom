<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    protected $price_range = [];
    protected $catagories = '';
    protected $limit = 10;
    protected $short_by = "ASC";
    
    public function catagory($name) {
        $catagory = Catagory::where('name', $name)->first();
        $this->data['catagory'] = $catagory;
        $this->data['catagories'] = Catagory::orderBy('created_at', 'DESC')->get();
        $this->data['products'] = Product::where('category_id', $catagory->id)->where('is_active', 1)->paginate($this->limit);
        $this->data['cart'] = array();
        $this->data['max'] = Product::max('regular_price');
        if (Auth::check()) {
            $this->data['cart'] = Auth::user()->carts()->get();
        }
        return view('frontend.pages.filter', $this->data);
    }
    public function filter(Request $request) {
        // low
        // high
        // catagory_id
        // limit
        // short_by
        $orderby = "ASC";
        if ($request->short_by == 'low_high') {
            $orderby = "ASC";
        }
        if ($request->short_by == 'high_low') {
            $orderby = "DESC";
        }
        $catagory = Catagory::where('id', $request->catagory_id)->first();
        $this->data['catagory'] = $catagory;
        $this->data['products'] = Product::where('category_id', $catagory->id)
                                            ->where('is_active', 1)
                                            ->whereBetween('regular_price', [$request->low, $request->high])
                                            ->orderBy('regular_price', $orderby)
                                            ->paginate((int)$request->limit);
        // return $this->data['products'];
        $this->data['cart'] = array();
        if (Auth::check()) {
            $this->data['cart'] = Auth::user()->carts()->get();
        }
        return view('frontend.pages.grid_response', $this->data);
    }
}
