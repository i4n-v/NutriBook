@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300']) !!}>
