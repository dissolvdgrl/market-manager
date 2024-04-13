<?php

namespace App\Livewire;

use App\Models\VendorApplication;
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
    public string $gas = '';
    #[Validate('required')]
    public array $products = [];
    public int $product_id = 1;

    public function render()
    {
        return view('livewire.application-form');
    }

    public function apply()
    {

        /*dd([
            $this->business_name,
            $this->phone_number,
            $this->website,
            $this->facebook_page,
            $this->instagram_page,
            $this->stand_type,
            $this->electrical_device_features,
            $this->gas,
            $this->products,
        ]);*/
        $this->validate();

        // Store the application in the database
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

        // Notify Market Admin

        // Notify applicant via email

        /* TODO
            3. When a pre-approved user submits an application, store it in db, notify the market admin, notify applicant, provide option to view application status.
            4. Allow market admin to change status of application. When status changes, notify applicant.
        */

        session()->flash('success', 'Application submitted! We will be in touch with you soon.');
        return $this->redirect('/apply');
    }
}
