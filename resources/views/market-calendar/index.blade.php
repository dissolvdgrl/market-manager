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
                <div class="divide-y divide-gray-300">
                    @foreach($market_days as $market_day)
                        <x-market-day-card :id="$market_day->id" :date="$market_day->date" :start="$market_day->start_time" :end="$market_day->end_time" />
                    @endforeach
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-8">Add a new date</h2>

            </div>
        </div>
    </div>
</x-app-layout>
