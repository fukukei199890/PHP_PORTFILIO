<x-user-layout>



    @isset($item)
    <div class="max-w-md mx-auto bg-gray-100 min-h-screen">

        <!-- タイトル -->
        <h1 class="text-center text-xl py-4 border-b">商品ページ</h1>

        <!-- 商品画像 -->
        <div class="p-4 border-b text-center">
            @if($item->images->first())
            <img
                src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                class="mx-auto w-40">
            @endif
        </div>

        <!-- 出品者 -->
        <div class="flex items-center gap-3 p-4 border-b">
            <div class="w-12 h-12 bg-gray-400 rounded-full"></div>
            <p class="text-lg font-semibold">{{ $item->user->name ?? '出品者' }}</p>
        </div>

        <!-- 商品情報 -->
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

            <div class="flex justify-between items-center">
                <p>求める商品</p>
                <a href="{{ route('goodsselect',$item->id) }}">
                    <button class="border px-4 py-1">選択する</button>
                </a>
            </div>

        </div>

        <!-- マッチ申請 -->
        <div class="p-4">
            @auth
            <a href="{{ route('request') }}">
                <button class="w-full border py-3 bg-gray-200 text-lg">
                    マッチ申請
                </button>

            </a>

            @endauth

            @guest
            <a href="{{ route('applicationnot') }}">
                <button class="w-full border py-3 bg-gray-200 text-lg">
                    マッチ申請
                </button>
            </a>
            @endguest

        </div>

    </div>
    @endisset

    @isset($result)

    <p>{{ $result }}</p>

    @endisset

</x-user-layout>