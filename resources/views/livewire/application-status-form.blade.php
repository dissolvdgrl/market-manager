<div>
    <form method="POST" wire:submit="updateApplicationStatus" class="flex flex-col items-start justify-items-start">
    @csrf
        <div class="">
            <div class="flex">
                <x-label for="application_status" value="{{ __('Update application status') }}" />
                <span class="required">*</span>
            </div>
            <select wire:model="application_status" name="application_status" class="relative cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6 mb-2">
                <option selected value="" disabled>Select an option...</option>
                <option value="approved">Approved</option>
                <option value="pending">Pending</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <div class="flex items-center gap-4">
            <x-button wire:loading.attr="disabled">Update</x-button>
            <div wire:loading class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </form>
</div>
