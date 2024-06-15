<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Market Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl grid grid-cols-2 gap-8 items-start mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-8">Upcoming markets</h2>
                @if (session()->has('success'))
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
                @endif
                <div class="divide-y divide-gray-300">
                    @foreach($market_days as $market_day)
                        <x-market-day-card :id="$market_day->id" :date="$market_day->date" :start="$market_day->start_time" :end="$market_day->end_time" />
                    @endforeach
                </div>
            </div>
            @can('create', App\Models\MarketDay::class)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-8">Add a new date</h2>
                    <livewire:market-day-create-form />
                </div>
                @endcan
        </div>
    </div>
</x-app-layout>
