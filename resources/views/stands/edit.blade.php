<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editing stand number ' . $stand->number)  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm-px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Stand information</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update the selected stand's information here</p>
                    </div>
                </div>
                <div class="md:col-span-2 px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <form method="POST" action="{{ route('stands.update', ['stand' => $stand]) }}">
                        @csrf
                        @method('PATCH')
                        <div class="">
                            <div class="flex">
                                <x-label for="Stand type" value="{{ __('Stand type') }}" />
                                <span class="required">*</span>
                            </div>
                            <select id="stand_type" class="block mt-1 w-full" type="select" name="stand_type" required >
                                @foreach($stand_types as $type)
                                    <option value="{{ $type->name }}" @if($stand->stand_type_id === $type->id) selected @endif>
                                        {{ ucfirst($type->name->value) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('stand_type') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex gap-4 mt-4">
                            <x-button type="submit">{{ __('Save') }}</x-button>
                            <x-button-link href="{{ url()->previous() }}">Cancel</x-button-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
