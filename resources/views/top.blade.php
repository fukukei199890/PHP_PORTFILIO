<x-user-layout>
    <div class="pb-10 bg-gray-50 min-h-screen">

        <div class="flex justify-between items-center bg-white shadow-sm px-4">
            <img src="{{ asset('images/logo.png') }}" class="h-16">
        </div>
        <!-- 元々の記述 -->
        <!-- <div class="text-center py-12 bg-cover bg-center"
            style="background-image: url('{{ asset('images/toppage.png') }}');">

            <h1 class="text-lg font-bold mt-6 tracking-normal text-gray-900 mx-auto w-full pb-2">
                いらないガチャ、交換しませんか？
            </h1>
            <p class="text-gray-600 mb-6 text-sm">
                あなたのダブり、誰かの欲しいかも。
            </p>

            <a href="{{ route('seach') }}">
                <button type="submit"
                    class="px-10 bg-blue-500 text-white py-3 rounded-full font-semibold shadow-lg hover:bg-blue-600 transition-all">
                    交換を探す
                </button>
            </a>
        </div> -->


        <!--検討中中 -->
        <div x-data="{ 
        active: 0, 
        bgStyles: [
            { from: 'from-blue-50', to: 'to-indigo-100/50', dot1: 'bg-purple-200', dot2: 'bg-blue-200' },
            { from: 'from-pink-50', to: 'to-rose-100/50', dot1: 'bg-orange-200', dot2: 'bg-red-200' },
            { from: 'from-green-50', to: 'to-emerald-100/50', dot1: 'bg-yellow-200', dot2: 'bg-teal-200' }
        ]
     }"
            x-init="setInterval(() => active = (active + 1) % bgStyles.length, 5000)"
            class="text-center py-12 px-4 relative overflow-hidden transition-all duration-1000 ease-in-out"
            :class="bgStyles[active].from + ' ' + bgStyles[active].to">

            <div class="absolute -top-10 -left-10 w-40 h-40 rounded-full mix-blend-multiply filter blur-xl opacity-70 transition-colors duration-1000"
                :class="bgStyles[active].dot1"></div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 rounded-full mix-blend-multiply filter blur-xl opacity-70 transition-colors duration-1000"
                :class="bgStyles[active].dot2"></div>

            <div class="relative z-10 max-w-lg mx-auto">
                <h1 class="text-base md:text-lg font-semibold tracking-tight text-gray-700 mb-1">
                    いらないガチャ、交換しませんか？
                </h1>
                <p class="text-sm md:text-base text-gray-500 mb-6">
                    あなたのダブり、誰かの欲しいかも。
                </p>

                <a href="{{ route('seach') }}">
                    <button type="submit"
                        class="px-10 bg-blue-500 text-white py-3 rounded-full font-semibold shadow-lg hover:bg-blue-600 transition-all">
                        交換を探す
                    </button>
                </a>


            </div>
        </div>
        <div class="px-6 mt-8">
            <div class="flex items-center justify-between mb-3 px-1">
                <h2 class="font-bold text-gray-800 text-base flex items-center gap-1">
                    <span class="text-orange-500">🔥</span> 人気の商品
                </h2>
                {{-- <a href="#" class="text-xs text-blue-500 font-medium">すべて見る</a> --}}
            </div>

            <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100">
                <div class="flex overflow-x-auto gap-4 pb-2 snap-x snap-mandatory scrollbar-hide" style="-ms-overflow-style: none; scrollbar-width: none;">
                    @foreach($favorite_item as $fav)
                    <div class="text-center flex-shrink-0 w-24 snap-start">
                        @if($fav->images->isNotEmpty())
                        <a href="{{ route('goods', $fav->id) }}">
                            <img src="{{ asset('storage/'.$fav->images->first()->image_url) }}"
                                class="border border-gray-50 mb-2 w-full aspect-square object-cover rounded-xl shadow-sm">
                        </a>
                        <p class="text-[10px] font-bold text-gray-700 leading-tight line-clamp-1">
                            {{ $fav->series_name }}
                        </p>
                        <div class="flex items-center justify-center gap-1 text-red-500 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-[10px] font-bold">{{ $fav->favorite_item_count ?? 0 }}</span>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="px-6 mt-8">
            <div class="flex items-center justify-between mb-3 px-1">
                <h2 class="font-bold text-gray-800 text-base flex items-center gap-1">
                    <span class="text-blue-500">✨</span> 新着の出品
                </h2>
            </div>

            <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100">
                <div class="flex overflow-x-auto gap-4 pb-2 snap-x snap-mandatory scrollbar-hide" style="-ms-overflow-style: none; scrollbar-width: none;">
                    @foreach($items as $item)
                    <div class="text-center flex-shrink-0 w-24 snap-start">
                        @if($item->images->isNotEmpty())
                        <a href="{{ route('goods', $item->id) }}">
                            <img src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                                class="border border-gray-50 mb-2 w-full aspect-square object-cover rounded-xl shadow-sm">
                        </a>
                        @endif

                        <p class="text-[10px] font-bold text-gray-700 leading-tight line-clamp-1">
                            {{ $item->series_name }}
                        </p>
                        <p class="text-[10px] text-gray-400 line-clamp-1 mt-0.5">
                            {{ $item->char_name }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</x-user-layout>