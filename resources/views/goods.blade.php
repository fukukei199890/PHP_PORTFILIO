<x-user-layout>

    <div class="max-w-md mx-auto bg-gray-50 min-h-screen">


        <h2 class="text-center text-lg py-4 border-b text-gray-900  ">商品ページ</h2>

        <div class="p-4 border-b text-center">
            @if($item->images->first())
            <img
                src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                class="mx-auto w-40">
            @endif
            <form action="{{ route('favorites.store',$item->id) }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-1 text-gray-400 hover:text-red-400 transition">
                    <span class="text-xl">♡</span> お気に入り登録
                </button>
            </form>
        </div>

        <div class="flex items-center gap-3 p-4 border-b">
            {{-- 相手のアイコン --}}
            <div class="w-20 h-20 bg-gray-50 border-2 border-gray-300 rounded-full flex items-center justify-center z-10 shadow-sm">
                <img src="{{ $item->user->icon_url ?: asset('images/default-icon.png') }}"
                    alt="{{ $item->user->name }}さんのアイコン"
                    class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm bg-gray-200">
            </div>
            <p class="text-base font-semibold">出品者:{{ $item->user->name ?? '出品者' }}</p>
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
                {{-- ログインしている場合 --}}
                @auth
                <form method="post" action="{{ route('goods.select') }}">
                    @csrf
                    <input type="hidden" name="listed_item_id" value="{{ $item->id }}">
                    <button class="w-full border border-indigo-500 text-indigo-500 px-4 py-2 rounded hover:bg-indigo-50 transition">
                        交換する商品を選択する
                    </button>
                </form>
                @endauth

                {{-- ログインしていない場合 --}}
                @guest
                <a href="{{ route('login') }}">
                    <button class="w-full border border-gray-400 text-gray-500 px-4 py-2 rounded hover:bg-gray-100 transition">
                        ログインして交換を申し込む
                    </button>
                </a>
                @endguest
            </div>

            <div class="p-4">

                <a href="{{ route('top') }}">
                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-xl font-bold text-sm">
                        ホームに戻る
                    </button>
                </a>

            </div>

        </div>


</x-user-layout>