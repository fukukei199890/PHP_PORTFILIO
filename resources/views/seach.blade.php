<x-user-layout>
    <div>
        <form method="post" action="{{ route('search.result') }}">
            @csrf
            <input type="text" name="search_series" placeholder="シリーズ名"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8" required>
            <input type="text" name="search_char" placeholder="キャラクター名"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            <div>
                <label>開封</label>
                <input type="radio" id="opend" name="is_opened" value="1">
                <label>未開封</label>
                <input type="radio" id="not_opend" name="is_opened" value="0">
            </div>
            <button
                class="w-full bg-blue-500 text-white py-3 rounded-full font-semibold hover:bg-blue-600 border border-white">
                検索
            </button>
        </form>
        <hr class="my-8">

        {{-- 検索結果表示エリア --}}
        @isset($results)
        @if ($results->isEmpty())
        <div class="text-center py-10">
            <p class="text-gray-500 text-lg">該当する商品は見つかりませんでした。</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($results as $row)
            <div class="border rounded-lg overflow-hidden bg-white shadow-sm hover:shadow-md transition shadow-sm">
                <a href="{{ route('goods', $row->id) }}" class="block">
                    {{-- 画像の表示 --}}
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        @if($row->images->first())
                        <img class="object-cover w-full h-full" src="{{ asset('storage/' . $row->images->first()->image_url) }}" alt="{{ $row->series_name }}">
                        @else
                        <span class="text-gray-400">No Image</span>
                        @endif
                    </div>
                </a>
                <div class="p-4 text-sm">
                    <p class="text-gray-500 mb-1">シリーズ</p>
                    <p class="font-bold text-gray-800 mb-2">{{ $row->series_name }}</p>
                    <p class="text-gray-500 mb-1">キャラクター</p>
                    <p class="font-bold text-gray-800">{{ $row->char_name }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @endisset
    </div>
</x-user-layout>