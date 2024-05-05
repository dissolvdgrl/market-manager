<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 divide-y">
                    @foreach($applications as $application)
                        <div class="grid grid-cols-4 items-center py-6">
                            <div class="col-span-3">
                                <div class="flex items-center">
                                    <a href="{{ route('apply.show', ['id' => $application->id]) }}">
                                        <h2 class="font-semibold text-xl mr-2">{{ $application->business_name }}</h2>
                                    </a>
                                    <x-status-flag :status="$application->status" />
                                </div>
                                <p class="text-gray-500 mt-2">
                                    Submission date: {{ date('d M Y', strtotime($application->created_at)) }}</p>
                            </div>
                            <div class="justify-self-center">
                                <x-button-link href="{{ route('apply.show', ['id' => $application->id]) }}">View application details</x-button-link>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
