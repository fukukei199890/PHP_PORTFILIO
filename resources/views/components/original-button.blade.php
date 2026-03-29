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
//出品検索ボタン
'blue' => 'bg-blue-500 hover:bg-blue-600 text-white',

// リクエスト周り
'yellow' => 'bg-yellow-400 hover:bg-yellow-500 text-yellow-900 shadow-yellow-100',

//マニュアル
'emerald' => 'bg-emerald-200 text-emerald-300 border border-emerald-200 hover:bg-emerald-100',

// 戻る・キャンセル：四角い枠線
'outline' => 'border border-gray-300 text-gray-500 hover:bg-gray-50',

//ログイン周り
'black' => 'bg-black hover:bg-gray-800 text-white shadow-gray-200',

];

//変数に代入
$colorClass = $colors[$color] ?? $colors['blue'];
@endphp


<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => "w-full $colorClass py-3 rounded-full font-semibold shadow-sm transition-all active:scale-95 flex items-center justify-center"
]) }}>
    {{ $slot }}
</button>