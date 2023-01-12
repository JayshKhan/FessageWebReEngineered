@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-1 pt-1 p-2 border rounded  border-primary shadow-lg shadow-blue-200 w-20 text-center text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out
            transform hover:-translate-y-1 hover:scale-110'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
