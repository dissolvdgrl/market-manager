<div>
    <form method="POST" wire:submit="apply">
        @csrf
        <div
            class="grid grid-cols-1 md:grid-cols-2 gap-8 content-start"
            x-data="{ products: $wire.products, product: { id: '', name: '', ingredients: '' }, electricalDeviceFeatures: $wire.electrical_device_features, showElectricalDeviceFeatures: false }"
        >
            <div class="">
                <div class="flex">
                    <x-label for="business_name" value="{{ __('Stall/Business Name') }}" />
                    <span class="required">*</span>
                </div>
                <x-input wire:model="business_name" id="business_name" class="block mt-1 w-full" type="text" name="business_name" :value="old('business_name')" autofocus required autocomplete="organization" placeholder="My Business" />
                @error('business_name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="">
                <div class="flex">
                    <x-label for="phone-number" value="{{ __('Phone number') }}" />
                    <span class="required">*</span>
                </div>
                <x-input wire:model="phone_number" id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" autofocus required autocomplete="tel" placeholder="082 345 6789" />
                @error('phone_number') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="">
                <x-label for="website" value="{{ __('Website') }}" />
                <x-input wire:model="website" id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')" autofocus autocomplete="website" placeholder="https://my-website.com" />
                @error('website') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="">
                <x-label for="facebook_page" value="{{ __('Facebook Page') }}" />
                <x-input wire:model="facebook_page" id="facebook_page" class="block mt-1 w-full" type="url" placeholder="https://facebook.com/my-page" name="facebook_page" :value="old('facebook_page')" />
                @error('facebook_page') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="">
                <x-label for="instagram_page" value="{{ __('Instagram Page') }}" />
                <x-input wire:model="instagram_page" id="instagram_page" class="block mt-1 w-full" type="url" placeholder="https://instagram.com/my-page" name="instagram_page" :value="old('instagram_page')" />
                @error('instagram_page') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div></div>

            <fieldset>
                <legend class="text-sm font-semibold leading-6 text-gray-900">Stand options</legend>
                <p class="mt-1 text-sm leading-6 text-gray-600">Select the type of stand you require.</p>
                <div class="mt-6 space-y-6">
                    <div class="flex items-center gap-x-3">
                        <input wire:model="stand_type" id="stand-standard" name="stand_type" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="standard" required @change="showElectricalDeviceFeatures = false">
                        <label for="stand-standard" class="block text-sm font-medium leading-6 text-gray-900">Standard &mdash; 3m &times; 3m @ R 320.00 per month</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input wire:model="stand_type" id="stand-electricity" name="stand_type" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="electricity" @change="showElectricalDeviceFeatures = true">
                        <label for="stand-electricity" class="block text-sm font-medium leading-6 text-gray-900">Electricity &mdash; 3m &times; 3m @ R 400.00 per month</label>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="gas" name="gas" wire:model="gas" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="text-sm leading-6">
                        <label for="gas" class="font-medium text-gray-900">I use gas</label>
                        <p class="text-gray-500">By checking this box, you confirm that you have read and understand the regulations about using gas in a public area and will adhere to it. A fire extinguisher is compulsory.</p>
                    </div>
                </div>
            </fieldset>

            <template x-if="showElectricalDeviceFeatures">
                <div class="flex gap-4 space-evenly">
                    <div class="w-full">
                        <div class="flex">
                            <x-label for="electrical_device_type" value="{{ __('Electrical device(s) type') }}" />
                            <span class="required">*</span>
                        </div>
                        <x-input wire:model="electrical_device_features.type" id="electrical_device_type" class="block mt-1 w-full" type="text" name="electrical_device_type" :value="old('electrical_device_features[\'type\']')" autofocus required placeholder="E.g. Microwave, coffee machine" />
                    </div>
                    <div class="w-full">
                        <div class="flex">
                            <x-label for="electrical_device_amps" value="{{ __('Electrical device(s) amps') }}" />
                            <span class="required">*</span>
                        </div>
                        <x-input wire:model="electrical_device_features.amps" id="electrical_device_amps" class="block mt-1 w-full" type="text" name="electrical_device_amps" :value="old('electrical_device_features[\'amps\']')" autofocus required placeholder="20 amps" />
                    </div>
                </div>
            </template>

            <div class="col-span-2">
                <p class="text-sm font-semibold leading-6 text-gray-900">My products</p>
                <p class="mt-1 text-sm leading-6 text-gray-600">Please add all of your products and their ingredients below. Samples may be requested before we approve your application. List all of the ingredients used in this product, including the oils you used to cook it in, if relevant.</p>
                <div class="flex justify-evenly gap-4 mt-1">
                    <x-input
                        x-model="product.name"
                        id="prod_{{ $product_id }}_name"
                        class="w-4/12"
                        type="text"
                        name="prod_{{ $product_id }}_name"
                        placeholder="My product name"
                        x-bind:required="products.length === 0"
                    />
                    <x-input
                        x-model="product.ingredients"
                        class="w-7/12"
                        placeholder="List your product's ingredients here"
                        x-bind:required="products.length === 0"
                    />
                    <span x-on:click="products.push({id: $wire.product_id, name: product.name, ingredients: product.ingredients }); $wire.product_id++; product.id = ''; product.name = ''; product.ingredients = '';" class="button w-1/12 cursor-pointer">Add &plus;</span>
                    @error('products') <span class="error">{{ $message }}</span> @enderror
                </div>
                    <ul role="list" class="divide-b divide-gray-100 mt-8">
                        <template x-for="product in products" :key="product.id">
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <span x-text="product.id"></span>
                                    <div class="min-w-0 flex-auto">
                                        <p x-text="product.name" class="text-sm font-semibold leading-6 text-gray-900"></p>
                                        <p x-text="product.ingredients" class="mt-1 truncate text-xs leading-5 text-gray-500"></p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <span x-on:click="products.splice((products.findIndex(product => product.id === product.id)), 1)" class="button hover:bg-red-700 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                        Remove
                                    </span>
                                </div>
                            </li>
                        </template>
                    </ul>
                <x-input hidden wire:model="products" x-model="products"></x-input>
            </div>

            <div class="col-span-2 flex items-center gap-4">
                <x-button class="justify-self-start">
                    {{ __('Submit') }}
                </x-button>
                <div wire:loading class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
        </div>
    </form>
</div>
