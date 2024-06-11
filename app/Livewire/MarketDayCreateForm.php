<?php

namespace App\Livewire;

use App\Models\MarketDay;
use Carbon\Carbon;
use Livewire\Component;

class MarketDayCreateForm extends Component
{
    public string $start;
    public string $end;
    public string $date;

    public function render()
    {
        return view('livewire.market-day-create-form');
    }

    public function create()
    {
        $marketDay = new MarketDay();
        $marketDay->start_time = new Carbon($this->start);
        $marketDay->date = $this->date;
        $marketDay->end_time = new Carbon($this->end);
        $marketDay->save();

        // TODO: show flash message
    }
}
