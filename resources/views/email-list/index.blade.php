<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Email') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center space-y-3">
                    <x-link :href="route('email-list.create')">{{ __('Create list') }}</x-link>
                    @forelse ($emailList as $list)
                    <div class="overflow-x-auto rounded border border-gray-500 p-4 w-[50%]">
                        <table class="table w-full text-left">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>{{ __('Title list') }}</th>
                                    <th class="text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$list->title}}</td>
                                    <td>
                                        <div class="flex justify-end space-x-4">
                                        <x-link :href="route('email-list.edit', $list->id)">{{ __('Edit') }}</x-link>
                                        <x-form id="delete-form-{{ $list->id }}" delete :route="route('email-list.destroy', $list->id)">
                                            <x-secondary-button
                                                data-form-id="delete-form-{{ $list->id }}">
                                                {{ __('Delete') }}
                                            </x-secondary-button>
                                        </x-form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @empty
                    <img src="assets/images/img-list.png" />
                    <p class="text-xs">Você ainda não criou nenhuma lista.</p>
                    <x-link :href="route('email-list.create')">Criar lista</x-link>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>