<x-user-layout>
    {{-- タイトル --}}
    <x-section-title>検索する</x-section-title>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50/50 pb-20">



        {{-- フォームエリア --}}
        <div class="px-6 mb-10">
            <form method="post" action="{{ route('search.result') }}" class="space-y-4">
                @csrf

                {{-- シリーズ名入力：コンポーネント化 --}}
                <x-original-input
                    type="text"
                    name="search_series"
                    placeholder="シリーズ名"
                    required />

                {{-- キャラクター名入力：コンポーネント化 --}}
                <x-original-input
                    type="text"
                    name="search_char"
                    placeholder="キャラクター名" />

                {{-- 開封・未開封選択エリア（構造はそのまま） --}}
                <div class="flex items-center justify-center gap-8 py-3 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" id="opend" name="is_opened" value="1" class="w-4 h-4 text-gray-900 focus:ring-gray-900 border-gray-300">
                        <label for="opend" class="text-sm font-bold text-gray-500 group-hover:text-gray-900 transition-colors" style="font-family: 'Zen Maru Gothic', sans-serif;">開封済み</label>
                    </div>
                    <div class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" id="not_opend" name="is_opened" value="0" class="w-4 h-4 text-gray-900 focus:ring-gray-900 border-gray-300">
                        <label for="not_opend" class="text-sm font-bold text-gray-500 group-hover:text-gray-900 transition-colors" style="font-family: 'Zen Maru Gothic', sans-serif;">未開封</label>
                    </div>
                </div>

                {{-- 検索ボタン --}}
                <div class="pt-2">
                    <x-original-button color="blue" class="w-full py-4 shadow-sm">検索</x-original-button>
                </div>
            </form>
        </div>

        <hr class="border-gray-200 mb-8 mx-10">

        {{-- 検索結果表示エリア --}}
        <div class="px-4">
            @isset($results)
            @if ($results->isEmpty())
            <div class="text-center py-20">
                <i class="fa-solid fa-ghost text-4xl text-gray-200 mb-4"></i>
                <p class="text-gray-400 font-bold" style="font-family: 'Zen Maru Gothic', sans-serif;">見つかりませんでした</p>
            </div>
            @else
            <div class="grid grid-cols-2 gap-4">
                @foreach ($results as $row)
                <div class="border border-gray-100 rounded-[24px] overflow-hidden bg-white shadow-sm hover:border-gray-300 transition-all">
                    <a href="{{ route('goods', $row->id) }}" class="block">
                        <div class="aspect-square bg-gray-50 flex items-center justify-center overflow-hidden">
                            @if($row->images->first())
                            <img class="object-cover w-full h-full" src="{{ asset('storage/' . $row->images->first()->image_url) }}" alt="{{ $row->series_name }}">
                            @else
                            <span class="text-gray-300 text-[10px] font-bold uppercase tracking-widest">No Image</span>
                            @endif
                        </div>
                    </a>
                    <div class="p-4 text-center" style="font-family: 'Zen Maru Gothic', sans-serif;">
                        <p class="text-xs font-bold text-gray-800 truncate mb-1">{{ $row->series_name }}</p>
                        <p class="text-[10px] text-gray-400 truncate">{{ $row->char_name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @endisset
        </div>
    </div>
</x-user-layout>