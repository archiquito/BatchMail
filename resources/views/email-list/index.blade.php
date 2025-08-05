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

                    @forelse ($emailList as $list)
                    //lista
                    @empty
                    <img src="assets/images/img-list.png" />
                    <p class="text-xs">Você ainda não criou nenhuma lista.</p>
                    <x-primary-button >Criar lista</x-primary-button>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>