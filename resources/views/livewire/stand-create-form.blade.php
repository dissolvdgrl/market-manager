<form wire:submit="create" >
        <div class="py-4 flex flex-col items-start">
            <label for="number" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Choose a <span class="font-bold">stand number</span>:</label>
            <input wire:model="number" type="number" id="number" name="number" required value="1" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block" />
            @error('number') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="py-4 flex flex-col items-start">
            <label for="stand_type" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Choose a <span class="font-bold">stand type</span>:</label>
            <select wire:model="stand_type_id" id="stand_type_id" class="block mt-1 w-full" type="select" name="stand_type_id" required >
                <option value="" selected default>...</option>
                @foreach($stand_types as $type)
                    <option value="{{ $type->id }}" >
                        {{ ucfirst($type->name->value) }}
                    </option>
                @endforeach
            </select>
            @error('stand_type_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <x-button>
            {{ __('Create') }}
        </x-button>
        <x-button-link>
            Cancel
        </x-button-link>
    </form>
