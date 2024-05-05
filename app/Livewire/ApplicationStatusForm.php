<?php

namespace App\Livewire;

use App\Models\VendorApplication;
use Livewire\Component;

class ApplicationStatusForm extends Component
{
    public int $application_id;
    public string $application_status;

    public function mount($application_id, $application_status)
    {
        $this->application_id = $application_id;
        $this->application_status = $application_status;
    }

    public function render()
    {
        return view('livewire.application-status-form');
    }

    public function updateApplicationStatus()
    {
        $application = VendorApplication::where('id', $this->application_id)->first();
        $application->status = $this->application_status;
        $application->save();

        session()->flash('success', 'Application updated! The applicant has been notified.');

        return $this->redirect("/applications/$this->application_id");
    }
}
