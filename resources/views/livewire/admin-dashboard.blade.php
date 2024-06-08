<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-8">Upcoming markets</h2>
    <div class="divide-y divide-gray-300">
        @foreach($market_days as $market_day)
            <x-market-day-card :date="$market_day->date" :start="$market_day->start_time" :end="$market_day->end_time" />
        @endforeach
    </div>
    <a href="{{ route('market-calendar.index') }}" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
        View all

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
        </svg>
    </a>
</div>

