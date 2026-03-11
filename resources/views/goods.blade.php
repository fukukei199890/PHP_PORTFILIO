<x-user-layout>


    <div class="max-w-md mx-auto bg-gray-100 min-h-screen">

        <h1 class="text-center text-xl py-4 border-b">商品ページ</h1>

        <div class="p-4 border-b text-center">
            @if($item->images->first())
            <img
                src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                class="mx-auto w-40">
            @endif
        </div>

        <div class="flex items-center gap-3 p-4 border-b">
            <div class="w-12 h-12 bg-gray-400 rounded-full"></div>
            <p class="text-lg font-semibold">{{ $item->user->name ?? '出品者' }}</p>
        </div>

        <div class="p-4 space-y-2">

            <div class="flex justify-between">
                <p>交換場所</p>
                <p>{{ $item->exchange_area }}</p>
            </div>

            <div class="flex justify-between">
                <p>シリーズ名</p>
                <p>{{ $item->series_name }}</p>
            </div>

            <div class="flex justify-between">
                <p>キャラ名</p>
                <p>{{ $item->char_name }}</p>
            </div>

            <div class="flex justify-between">
                <p>状態</p>
                <p>
                    @if($item->is_opened)
                    開封済
                    @else
                    未開封
                    @endif
                </p>
            </div>

            <div class="flex justify-between items-center border-b pb-2">
                <p>求める商品</p>
                <p>{{ $item->request_message }}</p>
            </div>

            <div class="py-4">
                <a href="{{ route('goodsselect',$item->id) }}">
                    <button class="w-full border border-indigo-500 text-indigo-500 px-4 py-2 rounded hover:bg-indigo-50 transition">
                        交換する商品を選択する
                    </button>
                </a>
            </div>

        </div>

        <div class="p-4">

            <a href="{{ route('top') }}">
                <button class="w-full border py-3   'bg-gray-200 text-gray-500' ">
                    ホームに戻る
                </button>
            </a>

        </div>

    </div>


</x-user-layout>