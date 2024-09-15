<?php

namespace App\Livewire;

use App\Models\Stand;
use App\Models\StandType;
use Livewire\Component;

class StandCreateForm extends Component
{
    public int $number;
    public int $stand_type_id;
    public $stand_types;

    public function mount(): void
    {
        $stand_types = StandType::get();

        $this->stand_types = $stand_types;
    }

    public function render()
    {
        return view('livewire.stand-create-form');
    }

    public function create()
    {

        $validated = $this->validate([
            'number' => 'required|unique:stands,number',
            'stand_type_id' => 'required',
        ]);

        Stand::create($validated);

        session()->flash('success-stand', 'Stand created');

        return $this->redirect('/stands');
    }
}
