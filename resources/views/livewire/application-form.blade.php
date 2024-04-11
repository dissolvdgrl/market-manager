<div>
    <form method="POST" wire:submit="apply">
        @csrf
        @if (true)
            <div class="rounded-md bg-green-50 p-4 my-8">
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
                            Success message goes here
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                wire:click="$set('successMessage', null)"
                                class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                                aria-label="Dismiss">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 content-start">
            <div class="">
                <div class="flex">
                    <x-label for="business_name" value="{{ __('Stall/Business Name') }}" />
                    <span class="required">*</span>
                </div>
                <x-input wire:model="business_name" id="bbusiness_name" class="block mt-1 w-full" type="text" name="business_name" :value="old('business_name')" autofocus required autocomplete="organization" placeholder="My Business" />
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
                        <input id="stand-standard" name="stand-options" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" required>
                        <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Standard &mdash; 3m &times; 2.5m @ R 320.00 per month</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input id="stand-electricity" name="stand-options" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Electricity &mdash; 3m &times; 2.5m @ R 400.00 per month</label>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="gas" name="gas" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="text-sm leading-6">
                        <label for="gas" class="font-medium text-gray-900">I use gas</label>
                        <p class="text-gray-500">By checking this box, you confirm that you have read and understand the regulations about using gas in a public area and will adhere to it. A fire extinguisher is compulsory.</p>
                    </div>
                </div>
            </fieldset>

            <div class="col-span-2" x-data="{ products: $wire.products, product: { id: '', name: '', ingredients: '' } }">
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
                                    <x-button x-on:click="products.splice((products.findIndex(product => product.id === product.id)), 1)" class="hover:bg-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                        Remove
                                    </x-button>
                                </div>
                            </li>
                        </template>
                    </ul>
            </div>

            <x-button class="justify-self-start mt-8">
                {{ __('Submit') }}
            </x-button>
        </div>
    </form>
</div>