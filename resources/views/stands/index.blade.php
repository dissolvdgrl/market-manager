<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl grid grid-cols-2 gap-8 items-start mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-8">Stands</h2>
                @if (session()->has('success-stand'))
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
                                    {{ session('success-stand-type')  }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="divide-y divide-gray-300">
                    @foreach($stands as $stand)

                        <div class="flex py-2 justify-between items-center">
                            <div class="flex flex-col">
                                <p class="font-semibold text-gray-600 dark:text-white">
                                    {{ ucfirst($stand->number) }}
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    {{ $stand->standType->name }}
                                </p>
                            </div>
                            @if( Auth::user()->is_admin() )
                                {{--<div class="flex gap-2">
                                    <a href="{{ route('stands.types.edit', ['type' => $stand->id]) }}" class="text-gray-400 hover:text-indigo-600 duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </div>--}}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
