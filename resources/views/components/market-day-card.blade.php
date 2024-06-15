@props(['id', 'date', 'start', 'end'])

<div class="flex py-2 justify-between items-center">
    <div class="flex flex-col">
        <p class="font-semibold text-gray-600 dark:text-white">
            {{ date('j F Y', strtotime($date)) }}
        </p>
        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            {{ date('G:i', strtotime($start)) }} &mdash; {{ date('G:i', strtotime($end)) }}
        </p>
    </div>
    @if( Auth::user()->role->name->value == 'admin' )
        <div class="flex gap-2">
            <a href="{{ route('market-calendar.edit', ['market_calendar' => $id]) }}" class="text-gray-400 hover:text-indigo-600 duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>

            <form action="{{ route('market-calendar.destroy', ['market_calendar' => $id]) }}" method="POST" x-data="{ showConfirmation: false }" class="relative">
                @csrf
                @method('DELETE')
                <span @click="showConfirmation = true" class="text-gray-400 hover:text-red-600 duration-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </span>

                <div
                    class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                    x-show="showConfirmation"
                >
                    <div x-data class="max-w-xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showConfirmation = false" >
                        <p class="font-bold text-xl">Are you sure you want to delete this market day?</p>
                        <p>Deleting it will cancel all bookings associated with it, and notify the vendors that have bookings for this market day. </p>
                        <p class="my-4 text-red-600 font-bold">You cannot undo this action.</p>
                        <button type="submit" class="button mr-4 bg-red-600">Yes, delete it</button>
                        <span @click="showConfirmation = false" class="text-gray-500 hover:text-gray-800 cursor-pointer duration-200">Cancel</span>
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>
