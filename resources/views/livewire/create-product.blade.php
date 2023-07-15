<form class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 md:px-8 space-y-12">
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Add the basic details for your product that would be visible to customers.") }}
            </p>
        </header>

        {{-- {{  $title }} --}}

        {{  var_dump($state) }}


        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input wire:model="state.title" id="title" class="block mt-1 w-full" type="text" name="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="slug" :value="__('Slug')" />
            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" />
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" class="block mt-1 w-full" rows="4" type="text" name="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="live" class="inline-flex items-center">
                <input id="live" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="live">
                <span class="ml-2 text-sm text-gray-600">live</span>
            </label>
        </div>

    </section>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add Files') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Attach files that customers would be able to download") }}
            </p>
        </header>
    </section>

    <x-primary-button>
        {{ __('Create Product') }}
    </x-primary-button>
</form>
