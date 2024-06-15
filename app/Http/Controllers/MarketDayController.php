<?php

namespace App\Http\Controllers;

use App\Models\MarketDay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketDayController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->user()->cannot('viewAny', MarketDay::class)) {
            abort(403);
        }

        $market_days = MarketDay::select('id', 'date', 'start_time', 'end_time')
            ->where('date', '>', now())
            ->orderBy('date', 'asc')
            ->get();

        return view('market-calendar.index', compact('market_days'));
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
    public function show(MarketDay $marketDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $this->authorize('update', MarketDay::class);
        $market_day = MarketDay::where('id', $id)->firstOrFail();
        return view('market-calendar.edit', compact('market_day'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MarketDay $marketDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $marketDay = MarketDay::where('id', '=', $id)->first();

        // TODO: first check if there aren't any bookings associated with this market day

        $marketDay->delete();

        session()->flash('success', 'Market day deleted.');
        return redirect('/market-calendar');
    }
}
