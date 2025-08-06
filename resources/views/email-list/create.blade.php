<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create List Email') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center space-y-3">

                    <x-form :route="route('email-list.store')" post class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="title" :value="__('Campaign title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="Escolha um nome para sua lista" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="csv" :value="__('Email list')" />
                            <x-text-input id="csv" class="block mt-1 w-full" type="file" name="csv" :value="old('csv')" placeholder="Faça o upload do arquivo CSV" />
                            <x-input-error :messages="$errors->get('csv')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-link :href="route('email-list.index')" class="ms-3">
                                {{ __('Back') }}
                            </x-link>
                            <x-primary-button class="ms-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </x-form>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>