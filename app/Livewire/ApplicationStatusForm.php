<?php

namespace App\Livewire;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\VendorApplication;
use App\Notifications\ApplicationUpdated;
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

        if ($application->status === 'approved')
        {
            $role = Role::where('name', RoleEnum::APPROVED)->first();
            $application->user->role_id = $role->id;
            $application->user->save();
        }

        $this->notify_applicant($application->id);

        session()->flash('success', 'Application updated! The applicant has been notified.');

        return $this->redirect("/applications/$this->application_id");
    }

    protected function notify_applicant($application_id): void
    {
        $application = VendorApplication::where('id', $application_id)->first();
        $application->user->notify(new ApplicationUpdated($application, $application->user->name));
    }
}
