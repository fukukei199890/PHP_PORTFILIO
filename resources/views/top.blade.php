<x-user-layout>
    {{-- ここからSEO対策--}}
    <x-slot name="title">CAPSULE LINK | 宮崎市内で直接手渡し！ガチャガチャ交換掲示板</x-slot>
    <x-slot name="description">宮崎のガチャガチャ交換所「CAPSULE LINK」。回しすぎたダブりや推し以外のカプセルトイを、送料なしの直接手渡しで交換しましょう。宮崎駅やイオンモール宮崎などで安心・おトクに取引！</x-slot>
    {{-- SEO対策ここまで --}}
    <div class="pb-10 bg-gray-50 min-h-screen">

        <header
            class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 px-4 h-16 flex justify-between items-center">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-10 object-contain">
                <h1 class="text-xl font-bold tracking-tighter text-gray-800 t italic uppercase"
                    style="font-family: 'M PLUS Rounded 1c', sans-serif;">
                    capsule link
                </h1>

                <!-- <h1 class="text-2xl font-black tracking-tighter text-cyan-600 italic uppercase drop-shadow-sm"
                    style="font-family: 'M PLUS Rounded 1c', sans-serif;">
                    Capsule <span class="text-cyan-400">Link</span>
                </h1> -->
            </a>


            <div class="flex items-center gap-3">
                @guest
                <a href="{{ route('seach') }}" class="p-2 text-gray-500 hover:bg-gray-100 rounded-full transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                @endguest

                @auth
                <a href="{{ route('notification') }}">通知</a>
                @endauth

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
            contents: [{
                    title: 'いらないガチャ、交換しませんか？',
                    subtitle: 'あなたのダブり、誰かの欲しいかも。',
                    // エメラルドボタンに合わせて、少しミント系の爽やかな背景
                    bg: 'bg-emerald-50',
                    glow: 'bg-emerald-200/40',
                    btnText: '使い方を見る',
                    btnColor: 'emerald',
                    btnRoute: '{{ route('manual') }}'
                },
                {
                    title: '欲しかったあのキャラが見つかる',
                    subtitle: '宮崎市のユーザーと直接手渡しで交換。',
                    // ブルーのボタンに合わせて、少し柔らかい空色の背景
                    bg: 'bg-blue-50',
                    glow: 'bg-blue-200/40',
                    btnText: '商品を探しに行く',
                    btnColor: 'blue',
                    btnRoute: '{{ route('seach') }}'
                },
                @guest
                    {
                        title: 'まずはログインして出品しよう',
                        subtitle: '登録するとお気に入り機能が使えます。',
                        // 黒ボタンを浮かび上がらせるため、温かみのあるベージュグレー
                        bg: 'bg-slate-100',
                        glow: 'bg-slate-300/50',
                        btnText: 'ログインはこちら',
                        btnColor: 'black',
                        btnRoute: '{{ route('login') }}'
                    }
                @endguest
            ]
        }" x-init="setInterval(() => active = (active + 1) % contents.length, 3500)"
            class="text-center py-8 px-4 relative overflow-hidden transition-colors duration-1000 ease-in-out h-[220px]"
            :class="contents[active].bg">

            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-64 h-64 rounded-full filter blur-[80px] transition-colors duration-1000 opacity-60"
                    :class="contents[active].glow"></div>
            </div>

            <div class="relative z-10 max-w-lg mx-auto h-full">
                <template x-for="(item, index) in contents" :key="index">
                    <div x-show="active === index" x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 transform translate-x-12"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        x-transition:leave="transition ease-in duration-500"
                        x-transition:leave-start="opacity-100 transform translate-x-0"
                        x-transition:leave-end="opacity-0 transform -translate-x-12"
                        class="absolute inset-0 flex flex-col justify-center items-center px-4">

                        <h2 x-text="item.title"
                            class="text-base font-black tracking-wider text-gray-800 mb-1"
                            style="font-family: 'M PLUS Rounded 1c', sans-serif;">
                        </h2>

                        <p x-text="item.subtitle"
                            class="text-sm leading-relaxed text-gray-500 mb-6"
                            style="font-family: 'Zen Maru Gothic', sans-serif; font-weight: 500;">
                        </p>
                        <a :href="item.btnRoute" class="inline-block w-full max-w-[240px]">
                            <button type="button"
                                :class="{
                                    'bg-emerald-500': item.btnColor === 'emerald',
                                    'bg-blue-500': item.btnColor === 'blue',
                                    'bg-black': item.btnColor === 'black'
                                }"
                                class="w-full text-white py-3 rounded-full font-bold shadow-lg transition-all text-sm"
                                style="font-family: 'Zen Maru Gothic', sans-serif; font-weight: 700;">
                                <span x-text=" item.btnText"></span>
                            </button>
                        </a>
                    </div>
                </template>
            </div>
        </div>
        <div class="px-6 mt-8">
            <div class="flex items-center justify-between mb-3 px-1">

                <x-section-title>
                    <span>🔥</span>
                    人気の商品
                </x-section-title>

            </div>
            <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100">
                <div class="flex overflow-x-auto gap-4 pb-2 snap-x snap-mandatory">
                    @foreach ($favorite_item as $fav)
                    @if ($fav->images->isNotEmpty())
                    <div class="text-center flex-shrink-0 w-24 snap-start">

                        <a href="{{ route('goods', $fav->id) }}">
                            <img src="{{ asset('storage/' . $fav->images->first()->image_url) }}"
                                class="border border-gray-50 mb-2 w-full aspect-square object-cover rounded-xl shadow-sm">
                        </a>
                        <p class="text-[12px] font-bold text-gray-700 leading-tight line-clamp-1">
                            {{ $fav->series_name }}
                        </p>
                        <div class="flex items-center justify-center gap-1 text-red-500 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-[10px] font-bold">{{ $fav->favorite_item_count ?? 0 }}</span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="px-6 mt-8">
            <div class="flex items-center justify-between mb-3 px-1">

                <x-section-title>
                    <span>✨</span>
                    新着の商品
                </x-section-title>

            </div>

            <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100">
                <div class="flex overflow-x-auto gap-4 pb-2 snap-x snap-mandatory">
                    @foreach ($items as $item)
                    @if ($item->images->isNotEmpty())
                    <div class="text-center flex-shrink-0 w-24 snap-start">

                        <a href="{{ route('goods', $item->id) }}">
                            <img src="{{ asset('storage/' . $item->images->first()->image_url) }}"
                                class="border border-gray-50 mb-2 w-full aspect-square object-cover rounded-xl shadow-sm">
                        </a>
                        <p class="text-[12px] font-bold">
                            {{ $item->series_name }}
                        </p>
                        <p class="text-[12px] text-gray-700 mt-0.5">
                            {{ $item->char_name }}
                        </p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</x-user-layout>