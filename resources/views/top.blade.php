<x-user-layout>
    <div class="pb-10 bg-gray-50 min-h-screen">

        <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 px-4 h-16 flex justify-between items-center">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-10 object-contain">
                <p class="text-lg font-bold tracking-tighter text-gray-800">
                    capsule link
                </p>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('seach') }}" class="p-2 text-gray-500 hover:bg-gray-100 rounded-full transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
            </div>
        </header>
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
    contents: [
        { 
            title: 'いらないガチャ、交換しませんか？', 
            subtitle: 'あなたのダブり、誰かの欲しいかも。',
            bg: 'bg-blue-50', glow: 'bg-blue-200/50' 
        },
        { 
            title: '欲しかったあのキャラが見つかる', 
            subtitle: '宮崎市のユーザーと直接手渡しで交換。',
            bg: 'bg-rose-50', glow: 'bg-rose-200/50' 
        },
        { 
            title: 'お金を使わずにコンプリート', 
            subtitle: 'ダブりをお宝に変える、新しい仕組み。',
            bg: 'bg-emerald-50', glow: 'bg-emerald-200/50' 
        }
    ]
}"
            x-init="setInterval(() => active = (active + 1) % contents.length, 3500)"
            class="text-center py-8 px-4 relative overflow-hidden transition-colors duration-1000 ease-in-out"
            :class="contents[active].bg">

            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-64 h-64 rounded-full filter blur-[80px] transition-colors duration-1000 opacity-60"
                    :class="contents[active].glow"></div>
            </div>

            <div class="relative z-10 max-w-lg mx-auto">
                <div class="h-28 flex flex-col justify-center relative w-full overflow-hidden">
                    <template x-for="(item, index) in contents" :key="index">
                        <div x-show="active === index"
                            x-transition:enter="transition ease-out duration-1000"
                            x-transition:enter-start="opacity-0 transform translate-x-8"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-transition:leave="transition ease-in duration-500"
                            x-transition:leave-start="opacity-100 transform translate-x-0"
                            x-transition:leave-end="opacity-0 transform -translate-x-8"
                            class="absolute inset-0 flex flex-col justify-center items-center">

                            <h1 x-text="item.title" class="text-lg md:text-xl font-bold tracking-tight text-gray-800 mb-2"></h1>
                            <p x-text="item.subtitle" class="text-sm md:text-base text-gray-600 mb-6"></p>
                        </div>
                    </template>
                </div>

                <a href="{{ route('manual') }}" class="inline-block mt-4">
                    <button type="button"
                        class="px-10 bg-blue-500 text-white py-3 rounded-full font-semibold shadow-md hover:bg-blue-600 transition-all hover:shadow-lg active:scale-95">
                        初めての方はこちら
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
                <div class="flex overflow-x-auto gap-4 pb-2 snap-x snap-mandatory">
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
                <div class="flex overflow-x-auto gap-4 pb-2 snap-x snap-mandatory">
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

</x-user-layout>