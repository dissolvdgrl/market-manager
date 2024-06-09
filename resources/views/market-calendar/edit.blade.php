<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editing ' . date('j F Y', strtotime($market_day->date))) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm-px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Market information</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update the selected market's information here</p>
                    </div>
                </div>
                <div class="md:col-span-2 px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <livewire:market-day-edit-form :id="$market_day->id" :date="$market_day->date" :start="$market_day->start_time" :end="$market_day->end_time"  />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
