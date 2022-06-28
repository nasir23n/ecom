<?php

namespace App\Http\Controllers\Backend\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(20);
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
            'name' => 'required|unique:brands,name',
            'details' => 'string|required'
        ]);

        Brand::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'details'   => $request->details,
            'status'   => $request->status ? true : false,
        ]);
        return redirect()->route('admin.brands.index')->with('success', 'Brand Created Successfylly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.create', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id,
            'details' => 'string|required'
        ]);
        $brand->update([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'details'   => $request->details,
        ]);
        return redirect()->route('admin.brands.index')->with('success', 'Brand Update Successfylly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand Deleted Successfylly');
    }
}
