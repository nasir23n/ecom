<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->data['category_active'] = 'active';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['category_all_active'] = 'active';
        $this->data['catagories'] = Catagory::all();
        return view('backend.category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['category_add_active'] = 'active';
        return view('backend.category.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'slug' => 'string|required|unique:catagories,slug',
            'image' => 'required|image|mimes:png,jpg,webp'
        ]);
        $image = $request->image->hashName();
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => 'frontend/category/'.$image,
        ];
        $img = Image::make($request->image);
        $img->save(public_path('frontend/category').'/'.$image);
        Catagory::create($data);
        return back()->with('success', 'Category Created Successfylly');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category'] = Catagory::find($id);
        return view('backend.category.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Catagory::find($id);
        $request->validate([
            'name' => 'string|required',
            'slug' => 'string|required'
        ]);
        
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $category->image,
        ];
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,webp'
            ]);
            $image = $request->image->hashName();
            $img = Image::make($request->image);
            $img->save(public_path('frontend/category').'/'.$image);
            $data['image'] = 'frontend/category/'.$image;
            if (file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
        }
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Catagory::find($id);
        if (file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }
        $category->delete();
        return back()->with('success', 'Category Deleted Successfully');
    }
}
