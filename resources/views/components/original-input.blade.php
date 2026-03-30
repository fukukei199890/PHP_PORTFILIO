@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => 'w-full bg-white rounded-full border border-gray-200 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 text-sm py-2 px-5 outline-none transition-all placeholder:text-gray-300'
]) !!} style="font-family: 'Zen Maru Gothic', sans-serif;">