<?php

namespace App\Livewire;

use App\Models\MarketDay;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $market_days = MarketDay::select('date', 'start_time', 'end_time')
            ->where('date', '>', now())
            ->orderBy('date', 'asc')
            ->limit(3)
            ->get();

        return view('livewire.admin-dashboard', compact('market_days'));
    }
}
