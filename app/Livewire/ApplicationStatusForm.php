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
    public string $application_note;

    public function mount($application)
    {
        $this->application = $application;
        $this->application_status = $application->status;
        $this->application_note = $application->note;
    }

    public function render()
    {
        return view('livewire.application-status-form');
    }

    public function updateApplicationStatus()
    {
        $this->application->status = $this->application_status;
        $this->application->note = $this->application_note;

        switch ($this->application_status) {
            case 'approved':
                $this->update_applicant_role(RoleEnum::APPROVED);
                break;
            case 'pending':
            case 'rejected':
                $this->update_applicant_role(RoleEnum::PRE_APPROVED);
                break;
        }

        $this->application->save();

        $this->notify_applicant($this->application->id);

        session()->flash('success', 'Application updated! The applicant has been notified.');

        return $this->redirect("/applications/" . $this->application->id);
    }

    protected function update_applicant_role(RoleEnum $role): void
    {
        $role = Role::where('name', $role)->first();
        $this->application->user->role_id = $role->id;
    }

    protected function notify_applicant($application_id): void
    {
        $this->application->user->notify(new ApplicationUpdated($this->application, $this->application->user->name));
    }
}
