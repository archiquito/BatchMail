<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Email') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center space-y-3">
                    @if($emailList->isEmpty())
                    <img src="assets/images/img-list.png" />
                    <p class="text-xs">Você ainda não criou nenhuma lista.</p>
                    <x-link :href="route('email-list.create')">Criar lista</x-link>
                    @else
                    <div class="flex justify-start w-full space-x-4 grid-cols-2 items-stretch">
                        <x-link :href="route('email-list.create')" class="rounded-md dark:bg-blue-800 dark:hover:bg-blue-900 dark:border-blue-900 whitespace-nowrap">{{ __('Create list') }}</x-link>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="pesquisar" />
                    </div>
                    <x-table :listHeader="['Title List', 'Qtd. Subscribers', 'Actions']" :listBody="$emailList" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>