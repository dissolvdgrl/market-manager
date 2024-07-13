<form wire:submit="create">
    <div class="py-4 flex flex-col items-start">
        <label for="market_start_time" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Choose a <span class="font-bold">start time</span> for this market day:</label>
        <input wire:model="start" type="time" id="market_start_time" name="market_start_time" min="08:00" max="18:00" required value="{{ date('H:i', strtotime($start)) }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block" />
    </div>
    <div class="py-4 flex flex-col items-start">
        <label for="market_start_time" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Choose an <span class="font-bold">end time</span> for this market day:</label>
        <input wire:model="end" type="time" id="market_end_time" name="market_end_time" min="08:00" max="18:00" required value="{{ date('H:i', strtotime($end)) }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block" />
    </div>
    <div class="py-4 flex flex-col items-start">
        <label for="market_start_time" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Choose a <span class="font-bold">date</span> for this market day:</label>
        <input type="date" id="market_date" name="market_date" min="{{ date('Y-m-d', strtotime((now()))) }}" required value="{{ date('Y-m-d', strtotime($date)) }}" wire:model="date" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block" />
    </div>

    <x-button>
        {{ __('Save') }}
    </x-button>
</form>
