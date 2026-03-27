@props(['color' => 'blue'])

<!-- ホバー時対策 -->
@php
// $colors = [
// 'blue' => 'bg-blue-500 hover:bg-blue-600 text-white',
// 'emerald' => 'bg-emerald-200 hover:bg-emerald-300 text-white',
// 'red' => 'bg-red-500 hover:bg-red-600 text-white',

// ];

// 検討中
$colors = [
//ボタン
'blue' => 'bg-blue-500 hover:bg-blue-600 text-white',

// メイン：元気なオレンジ（ガチャガチャのワクワク感）
'orange' => 'bg-orange-500 hover:bg-orange-600 text-white shadow-orange-200',

// サブ：優しいイエロー（お宝を見つけた感）
'yellow' => 'bg-yellow-400 hover:bg-yellow-500 text-yellow-900 shadow-yellow-100',

// 成功・進む：上品なエメラルド（交換成立！）
'emerald' => 'bg-emerald-200 text-emerald-300 border border-emerald-200 hover:bg-emerald-100',

// 戻る・キャンセル：四角い枠線
'outline' => 'border border-gray-300 text-gray-500 hover:bg-gray-50',

// 警告：薄い赤
'red' => 'bg-red-50 text-red-700 border border-red-200 hover:bg-red-100',
];
$colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => "w-full $colorClass py-3 rounded-full font-semibold shadow-sm transition-all active:scale-95 flex items-center justify-center"
]) }}>
    {{ $slot }}
</button>