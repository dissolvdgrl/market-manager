<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if( Auth::user()->is_pre_approved() )
                    <x-welcome></x-welcome>
                @elseif( Auth::user()->is_approved() )
                @elseif( Auth::user()->is_early_access() )
                @elseif( Auth::user()->is_admin() )
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
