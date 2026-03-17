<x-user-layout>

    {{-- statusという名前でメッセージが届いていたら表示する --}}
    @if (session('status'))
    <div class="max-w-md mx-auto mt-4 mx-4 px-4 py-3 rounded-xl bg-green-100 border border-green-200 text-green-700 flex items-center gap-2 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span class="font-bold text-sm">{{ session('status') }}</span>
    </div>
    @endif

    <div class="pb-10">

        <div class="flex justify-between items-center bg-white">
            <img src="{{ asset('images/logo.png') }}" class="h-20">
        </div>

        <div class="text-center py-12 bg-cover bg-center"
            style="background-image: url('{{ asset('images/toppage.png') }}');">

            <h1 class="text-lg font-bold mt-6 tracking-normal text-gray-900 mx-auto w-full pb-2">
                いらないガチャ、交換しませんか？
            </h1>
            <p class="text-gray-600 mb-6 text-sm">
                あなたのダブり、誰かの欲しいかも。
            </p>

            <a href="{{ route('seach') }}">
                <button type="submit"
                    class="px-10 bg-blue-500 text-white py-3 rounded-full font-semibold hover:bg-blue-600">
                    交換を探す
                </button>
            </a>
        </div>

        <div class="px-6 mt-6">
            <div class="bg-[#e7dcc6] rounded-[30px] p-4 border border-yellow-400">
                <p class="mb-3 font-bold">
                    人気商品
                </p>

                <div class="grid grid-cols-3 gap-4">
                    @foreach($favorite_item as $fav)

                    <div class="text-center">
                        @if($fav->images->isNotEmpty())
                        <a href="{{ route('goods', $fav->id) }}">
                            <img src="{{ asset('storage/'.$fav->images->first()->image_url) }}"
                                class="border mb-2 w-full aspect-square object-cover rounded-lg">
                        </a>
                        <p class="text-[10px] leading-tight line-clamp-1">{{ $fav->series_name }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="px-6 mt-6">
            <div class="border border-red-400 rounded-[30px] p-4">
                <p class="mb-4 font-bold">
                    新着出品
                </p>

                <div class="grid grid-cols-3 gap-4">
                    @foreach($items as $item)
                    <div class="text-center">
                        @if($item->images->isNotEmpty())
                        <a href="{{ route('goods', $item->id) }}">
                            <img src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                                class="border mb-2 w-full aspect-square object-cover rounded-lg">
                        </a>
                        @endif

                        <p class="text-[10px] font-medium leading-tight line-clamp-1">
                            {{ $item->series_name }}
                        </p>
                        <p class="text-[10px] text-gray-500 line-clamp-1">
                            {{ $item->char_name }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</x-user-layout>