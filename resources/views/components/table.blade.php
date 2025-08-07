@props([
'listHeader',
'listBody'

])

<div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
    <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
        @if(!empty($listHeader))
        <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                @foreach($listHeader as $header)
                <th scope="col" class="{{$header === 'Actions' ? 'p-4 w-[10%]' : 'p-4'}}">{{__($header)}} </th>
                @endforeach
            </tr>
        </thead>
        @endif
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @forelse($listBody as $row)
            <tr>

                <td class="p-4">{{$row->title}}</td>
                <td class="p-4">{{$row->subscribers()->count()}}</td>
                <td class="p-4">
                    <div class="flex justify-end space-x-4">
                        <x-tooltip label="{{ __('Edit') }}">
                            <x-link hasToolTip={{true}} class="rounded-full py-3" :href="route('email-list.edit', $row->id)">
                                <div class="icon-pencil text-gray-300 text-base font-normal"></div>
                            </x-link>
                        </x-tooltip>

                        <x-form delete :route="route('email-list.destroy', $row->id)">
                            <x-tooltip label="{{ __('Delete') }}">
                                <x-secondary-button type="submit" hasToolTip={{true}} class="rounded-full py-3">
                                    <div class="icon-trash-2 text-gray-300 text-base font-normal"></div>
                                </x-secondary-button>
                            </x-tooltip>
                        </x-form>
                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="{{ count($listHeader) }}" class="p-4 text-center text-on-surface-variant dark:text-on-surface-dark-variant">
                    {{ __('Nenhum dado disponível.') }}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>