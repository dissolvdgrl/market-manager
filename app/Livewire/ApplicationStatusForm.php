<?php

namespace App\Livewire;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\VendorApplication;
use App\Notifications\ApplicationUpdated;
use Livewire\Component;

class ApplicationStatusForm extends Component
{
    public VendorApplication $application;
    public string $application_status;

    public function mount($application, $application_status)
    {
        $this->application = $application;
        $this->application_status = $application_status;
    }

    public function render()
    {
        return view('livewire.application-status-form');
    }

    public function updateApplicationStatus()
    {
        $this->application->status = $this->application_status;
        $this->application->save();

        switch ($this->application_status) {
            case 'approved':
                $this->update_applicant_role(RoleEnum::APPROVED);
                break;
            case 'pending':
            case 'rejected':
                $this->update_applicant_role(RoleEnum::PRE_APPROVED);
                break;
        }

        $this->notify_applicant($this->application->id);

        session()->flash('success', 'Application updated! The applicant has been notified.');

        return $this->redirect("/applications/" . $this->application->id);
    }

    protected function update_applicant_role(RoleEnum $role): void
    {
        $role = Role::where('name', $role)->first();
        $this->application->user->role_id = $role->id;
        $this->application->user->save();
    }

    protected function notify_applicant($application_id): void
    {
        $this->application->user->notify(new ApplicationUpdated($this->application, $this->application->user->name));
    }
}
