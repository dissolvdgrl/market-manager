<?php

namespace App\Livewire;

use Illuminate\Foundation\Application;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ApplicationForm extends Component
{
    #[Validate('required')]
    public string $business_name;
    #[Validate('required')]
    public int $phone_number;
    public string $website;
    public string $facebook_page;
    public string $instagram_page;
    #[Validate('required')]
    public array $stand_options;
    #[Validate('required')]
    public array $products;
    public int $product_id = 1;
    public string $product_name = '';
    public string $product_ingredients = '';

    public function render()
    {
        return view('livewire.application-form');
    }

    public function apply()
    {
        $this->validate();
        session()->flash('success', 'Application submitted!');
    }

    public function add_product(): void
    {
        $product = [
            'product_id' => $this->product_id++,
            'product_name' => $this->product_name,
            'product_ingredients' => $this->product_ingredients,
        ];

        $this->products[] = $product;
    }
}
