@props([
'route',
'post' => null,
'put' => null,
'patch' => null,
'delete' => null,
])

@php
$method = $post || $put || $patch || $delete ? 'post' : 'get';
@endphp

<form action="{{ $route }}" method="{{ $method }}" {{ $attributes }}>
    @csrf

    @if($put)
    @method('put')
    @endif

    @if($patch)
    @method('patch')
    @endif

     @if($delete)
    @method('delete')
    @endif

    {{$slot}}
</form>