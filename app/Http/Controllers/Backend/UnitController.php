<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::paginate(20);
        return view('backend.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.unit.create');
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
            'name' => 'required|unique:units,name',
            'details' => 'string|required'
        ]);

        Unit::create([
            'name'      => $request->name, 
            'details'   => $request->details,
            'status'   => $request->status ? true : false,
        ]);
        return redirect()->route('admin.units.index')->with('success', 'Unit Created Successfylly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('backend.unit.create', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required|unique:units,name,'.$unit->id,
            'details' => 'string|required'
        ]);

        $unit->update([
            'name'      => $request->name, 
            'details'   => $request->details,
            'status'   => $request->status ? true : false,
        ]);
        return redirect()->route('admin.units.index')->with('success', 'Unit Updated Successfylly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('admin.units.index')->with('success', 'Unit Deleted Successfylly');
    }
}
