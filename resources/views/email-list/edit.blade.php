<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit List Email') }}
        </h2>
    </x-slot>
@php
dump($emailList);
@endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center space-y-3">

                    <div class="flex justify-start w-full space-x-4 grid-cols-2 items-stretch">
                        <x-link :href="route('email-list.create')" class="rounded-md dark:bg-blue-800 dark:hover:bg-blue-900 dark:border-blue-900 whitespace-nowrap">{{ __('Create list') }}</x-link>
                        <x-form :route="route('email-list.search')" post class="w-full">
                            <x-text-input id="search" class="block mt-1 w-full" type="text" name="search" :value="old('search')" :placeholder="__('Search')" />
                        </x-form>
                    </div>

                    <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
                        <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                            <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                                <tr>
                                    <th scope="col" class="p-4">{{__('Name')}}</th>
                                    <th scope="col" class="p-4">{{__('Email')}}</th>
                                    <th scope="col" class="p-4 w-[10%] text-right">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline dark:divide-outline-dark">
                                @php
                                    // Para listas grandes, o ideal seria paginar os resultados.
                                    $subscribers = $emailList->subscribers()->get();
                                @endphp
                                @forelse($subscribers as $subscriber)
                                <tr>
                                    <td class="p-4">{{ $subscriber->name }}</td>
                                    <td class="p-4">{{ $subscriber->email }}</td>
                                    <td class="p-4">
                                        {{-- As ações para cada assinante (ex: editar, excluir) podem ser adicionadas aqui. --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-on-surface-variant dark:text-on-surface-dark-variant">
                                        {{ __('Nenhum assinante nesta lista.') }}
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>