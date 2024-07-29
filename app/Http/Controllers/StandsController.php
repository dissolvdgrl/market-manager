<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\StandType;
use Illuminate\Http\Request;

class StandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stands = Stand::all();
        $stand_types = StandType::all();
        return view('stands.index', compact('stands', 'stand_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stand $stand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stand $stand)
    {
        $stand_types = StandType::all();
        return view('stands.edit', compact('stand', 'stand_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stand $stand)
    {
        $stand_type = StandType::where('name', $request->get('stand_type'))->first();
        $stand->stand_type_id = $stand_type->id;
        $stand->save();

        session()->flash('success-stand', 'Stand updated successfully.');

        return redirect()->route('stands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stand $stand)
    {
        //
    }
}
