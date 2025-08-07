@props([
'label',
])
<div class="relative w-fit">
    {{$slot}}
    <div {{ $attributes->merge(['class' => 'absolute -top-9 left-1/2 -translate-x-1/2 z-10 
                                                    whitespace-nowrap rounded-sm bg-surface-dark px-2 py-1 text-center
                                                    dark:bg-black dark:border dark:border-gray-600 
                                                    text-sm text-on-surface-dark-strong opacity-0 transition-all ease-out 
                                                    peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-surface dark:text-on-surface-strong']) }}
        role="tooltip">{{$label}}</div>
</div>