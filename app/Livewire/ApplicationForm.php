<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\VendorApplication;
use App\Notifications\ApplicationSubmitted;
use App\Notifications\NewApplication;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ApplicationForm extends Component
{
    #[Validate('required')]
    public string $business_name = '';
    #[Validate('required')]
    public int $phone_number = 0;
    public string $website = '';
    public string $facebook_page = '';
    public string $instagram_page = '';
    #[Validate('required')]
    public string $stand_type = '';
    public array $electrical_device_features = [];
    public int $gas = 0;
    #[Validate('required')]
    public array $products = [];
    public int $product_id = 1;

    public function render()
    {
        return view('livewire.application-form');
    }

    public function apply()
    {
        $this->validate();
        
        $user = auth()->user();
        $user->application()->create([
                'business_name' => $this->business_name,
                'phone_number' => $this->phone_number,
                'website' => $this->website,
                'facebook' => $this->facebook_page,
                'instagram' => $this->instagram_page,
                'stand_type' => $this->stand_type,
                'electricity_details' => json_encode($this->electrical_device_features),
                'uses_gas' => $this->gas,
                'products' => json_encode($this->products),
            ]);

        $this->notify_admin($user->id);

        $this->notify_applicant();

        session()->flash('success', 'Application submitted! We have emailed you a copy of your application and will let you know once your application has been reviewed.');

        return $this->redirect('/apply');
    }

    protected function notify_admin(int $user_id): void
    {
        $new_application = VendorApplication::where('user_id', $user_id)->first();
        $admin = User::whereHas('role', function ($query) {
          $query->where('name', 'admin');
        })->first();

        $admin->notify(new NewApplication($new_application));
    }

    protected function notify_applicant(): void
    {
        $user = auth()->user();
        $new_application = VendorApplication::where('user_id', $user->id)->first();
        $user->notify(new ApplicationSubmitted($new_application, $user->name));
    }

}
