@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'w-full bg-white rounded-2xl border border-gray-200 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 text-sm py-3 px-5 outline-none transition-all placeholder:text-gray-300'
]) !!} style="font-family: 'Zen Maru Gothic', sans-serif;">{{ $slot }}</textarea>