<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if( Auth::user()->role->name->value == 'pre_approved' )
                <x-welcome></x-welcome>
                @elseif( Auth::user()->role->name->value == 'approved' )
                @elseif( Auth::user()->role->name->value == 'early_access' )
                @elseif( Auth::user()->role->name->value == 'admin' )
                    <livewire:admin-dashboard />
                    <!--
                    show admin cards
                        - Applications
                        - Calendar
                        - Users
                    -->

                @endif
            </div>
        </div>
    </div>
</x-app-layout>
