<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller {
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['product_active'] = 'active';
    }
    public function index() {
        $this->data['product_add_active'] = 'active';
        $this->data['catagories'] = Catagory::orderBy('id', 'DESC')->get();
        return view('backend.product.add', $this->data);
    }
    public function info_add(Request $request) {
        $request->validate([
            'name' => 'required',
            'regular_price' => 'required',
            'catagory' => 'required',
            'description' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'regular_price' => $request->regular_price, 
            'sale_price' => $request->sell_price,
            'featured' => ($request->is_featured) ? true : false,
            'quantity' => ($request->quantity) ? $request->quantity : 10,
            'category_id' => $request->catagory,
        ]; 
        $product = Product::create($data);
        return redirect()->route('product.info.edit', $product->id)->with('success', 'Product added successfully');
    }
    public function info_update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'regular_price' => 'required',
            'catagory' => 'required',
            'description' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'regular_price' => $request->regular_price, 
            'sale_price' => $request->sell_price,
            'featured' => ($request->is_featured) ? true : false,
            'quantity' => $request->quantity,
            'category_id' => $request->catagory,
        ]; 
        Product::where('id', $product->id)->update($data);
        return redirect()->route('product.info.edit', $product->id)->with('success', 'Product Updated Successfully');
    }
    public function info_edit(Product $product) {
        $this->data['catagories'] = Catagory::orderBy('id', 'DESC')->get();
        $this->data['product'] = $product;
        return view('backend.product.info_edit', $this->data);
    }
    public function gallery(Product $product) {
        $this->data['product'] = $product;
        return view('backend.product.gallery', $this->data);
    }
    public function publish(Product $product) {
        $this->data['product'] = $product;
        return view('backend.product.publish', $this->data);
    }
    public function publish_product(Request $request,Product $product) { 
        $request->validate([
            'is_publish' => 'required',
        ]);
        Product::where('id', $product->id)->update([
            'is_active' => ($request->is_publish == 'on') ? 1 : 0,
        ]); 
        return redirect()->route('product.all')->with('success', 'Product published successfully');
    }
    public function all() { 
        $this->data['product_all_active'] = 'active';
        $this->data['all_product'] = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('backend.product.all', $this->data);
    }
    // public function store(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'slug' => 'required|unique:products,slug',
    //         'regular_price' => 'required',
    //         'image' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $images = json_decode($request->images);
    //     $single_image = Image::make(public_path('tempr').'/'.$request->image); 
    //     $single_image->save(public_path('frontend/products').'/'.$request->image);
    //     unlink(public_path('tempr').'/'.$request->image);
    //     if (is_array($images)) {
    //         foreach ($images as $value) {
    //             $img = Image::make(public_path('tempr').'/'.$value); 
    //             $img->save(public_path('frontend/products').'/'.$value);
    //             unlink(public_path('tempr').'/'.$value);
    //         }
    //     }
    //     $data = [
    //         'name' => $request->name,
    //         'slug' => $request->slug,
    //         'short_description' => $request->short_description,
    //         'description' => $request->description,
    //         'regular_price' => $request->regular_price, 
    //         'sale_price' => $request->sell_price, 
    //         'SKU' => 'DIGI'.time(), 
    //         'stock_status' => $request->status,
    //         'featured' => ($request->is_featured) ? true : false,
    //         'quantity' => $request->quantity,
    //         'image' => $request->image, 
    //         'images' => json_encode($request->images), 
    //         'category_id' => $request->catagory,
    //     ]; 
    //     Product::create($data);
    //     return redirect()->route('product.add')->with('success', 'Product added successfully');
    // }


    // public function edit(Product $product) {
    //     $this->data['product'] = $product;
    //     $this->data['catagories'] = Catagory::orderBy('id', 'DESC')->get();
    //     return view('backend.product.edit', $this->data);
    // }
    // public function update(Request $request, Product $product) {
    //     dd($product);
    // }
    // public function delete(Request $request, Product $product) {}

    public function single_upload(Request $request, Product $product) {
        $data = json_decode($request->data);
        $image_name = $request->image->hashName();
        $img = Image::make($request->image)->crop($data->width, $data->height, $data->x, $data->y);
        $img->save(public_path('frontend/products').'/'.$image_name);
        if (is_file(public_path('frontend/products').'/'.$product->image)) {
            unlink(public_path('frontend/products').'/'.$product->image);
        }
        $product->update([
            'image' => $image_name,
        ]);
        return $image_name;
    }
    public function multi_upload(Request $request, Product $product) {
        $data = json_decode($request->data);
        $img_arr = ($product->images) ? json_decode($product->images) : [];
        $image_name = $request->image->hashName();
        $img = Image::make($request->image)->crop($data->width, $data->height, $data->x, $data->y);
        $img->save(public_path('frontend/products').'/'.$image_name);
        array_push($img_arr, $image_name);
        $product->update([
            'images' => json_encode($img_arr),
        ]);
        return json_encode($img_arr);
    }
    public function delete_multi(Request $request, Product $product) {
        $image_name = $request->image;
        $img_arr = ($product->images) ? json_decode($product->images) : [];
        $f_array = array_diff($img_arr, [$image_name]); 
        if (is_file(public_path('frontend/products').'/'.$image_name)) {
            unlink(public_path('frontend/products').'/'.$image_name);
        }
        $product->update([
            'images' => json_encode($f_array),
        ]);
        return json_encode($f_array);
    }
    public function delete_single(Request $request, Product $product) {
        $image_name = $request->image;
        if (is_file(public_path('frontend/products').'/'.$image_name)) {
            unlink(public_path('frontend/products').'/'.$image_name);
        }
        $product->update([
            'image' => null,
        ]);
        return true;
    }
    // public function remove(Request $request) {
    //     $image = $request->image;
    //     unlink(public_path('tempr').'/'.$image);
    //     return 'delete_success';
    // }
}
