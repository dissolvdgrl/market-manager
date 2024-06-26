<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apply to sell at the market') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if (session()->has('success'))
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent flex gap-x-4">
                        <div class="rounded-md bg-green-50 p-4 w-full">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-green-800">
                                    {{ session('success')  }}
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>
                @endif
                @if(! $has_applications)
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 flex gap-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>

                        <div>
                            <h1 class="text-2xl font-medium text-gray-900 dark:text-white flex gap-x-2 items-center">

                                    Before applying, please make sure you have read and understood the market's terms and conditions.
                            </h1>

                            <p class="mt-4 text-sm">
                                <a href="/terms-and-conditions" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                                    Read the terms and conditions

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="p-6 lg:p-8">
                        <livewire:application-form />
                    </div>
                @else
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 flex gap-x-4">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-white flex gap-x-2 items-center">Your applications
                        </h1>

                    </div>
                    <div class="p-6 lg:p-8">
                        @foreach($applications as $application)
                            <div class="grid grid-cols-4 items-center ">
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
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
