<?php

namespace App\Http\Controllers;

use App\Models\StandType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StandTypesController extends Controller
{
    public function index(Request $request)
    {

        if($request->user()->cannot('viewAny', StandType::class)) {
            abort(403);
        }

        $stand_types = StandType::all();
        return view('stands.types.index', compact('stand_types'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(StandType $stand_type)
    {
        //
    }

    public function edit(Request $request, int $id)
    {
        if($request->user()->cannot('update', StandType::class)) {
            abort(403);
        }
        $stand_type = StandType::where('id', $id)->firstOrFail();
        return view('stands.types.edit', compact('stand_type'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'price' => 'required',
        ]);

        $stand_type = StandType::where('id', $id)->firstOrFail();

        $stand_type->price =$request->input('price');
        $stand_type->save();

        session()->flash('success-stand-type', 'Stand type updated successfully.');

        return redirect()->route('stands.types.index');
    }

    public function destroy(int $id)
    {
        //
    }
}
