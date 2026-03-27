@props(['color' => 'blue'])

<!-- ホバー時対策 -->
@php
$colors = [
'blue' => 'bg-blue-500 hover:bg-blue-600 text-white',
'emerald' => 'bg-emerald-200 hover:bg-emerald-300 text-white',
'red' => 'bg-red-500 hover:bg-red-600 text-white',

];
$colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => "w-full $colorClass py-3 rounded-full font-semibold shadow-sm transition-all active:scale-95 flex items-center justify-center"
]) }}>
    {{ $slot }}
</button>