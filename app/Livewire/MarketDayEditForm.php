<?php

namespace App\Livewire;

use App\Models\MarketDay;
use Carbon\Carbon;
use Livewire\Component;

class MarketDayEditForm extends Component
{
    public string $start;
    public string $end;
    public string $date;
    public int $id;

    public function render()
    {
        return view('livewire.market-day-edit-form');
    }

    public function mount($start, $end, $date)
    {
        $this->start = date('H:i', strtotime($start));
        $this->end = date('H:i', strtotime($end));
        $this->date = $date;
    }

    public function store(int $id)
    {
        $this->authorize('update', MarketDay::class);
        $market_day = MarketDay::find($id);
        $market_day->start_time = Carbon::parse($this->date . $this->start);
        $market_day->end_time = Carbon::parse($this->date . $this->end);
        $market_day->date = $this->date;
        $market_day->save();

        session()->flash('success', 'Market day updated successfully.');

        return $this->redirect('/market-calendar');
    }
}
