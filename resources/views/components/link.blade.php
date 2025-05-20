@props(['active'])

@php
    $class = ($active ?? false) ? 'px-4 py-1 rounded border-b-zinc-400 bg-zinc-500 '  : 'px-4 py-1 rounded border-b-zinc-400 ' 

@endphp

<a {{ $attributes->merge(['class'=> $class]) }} >{{ $slot }}</a>

