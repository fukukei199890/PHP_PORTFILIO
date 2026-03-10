<x-user-layout>

    <div class=" pb-20">

        <!-- ヘッダー -->
        <div class="flex justify-between items-center p-4 bg-white">

            <img src="{{ asset('images/logo.png') }}" class="h-20">

        </div>


        <!-- ヒーロー -->
        <div class="text-center py-16 bg-cover bg-center"
            style="background-image: url('{{ asset('images/hero-bg.png') }}');">

            <h1 class="text-2xl font-bold mb-6 tracking-widest">
                いらないガチャ、交換しませんか？
            </h1>
            <p class="text-gray-600 mb-6">
                あなたのダブり、誰かの欲しいかも。
            </p>

            <a href="{{ route('seach') }}"
                class="inline-block px-10 py-3 text-white text-lg rounded-full
bg-gradient-to-r from-green-300 to-red-400 shadow">

                交換を探す

            </a>


        </div>



        <!-- 人気商品 -->
        <div class="px-6 mt-6">

            <div class="bg-[#e7dcc6] rounded-[30px] p-4 border border-yellow-400">

                <p class="mb-3 font-bold">
                    人気商品
                </p>



            </div>

        </div>



        <!-- 新着出品 -->
        <div class="px-6 mt-6">

            <div class="border border-red-400 rounded-[30px] p-4">

                <p class="mb-4 font-bold">
                    新着出品
                </p>


                <div class="grid grid-cols-3 gap-4">

                    @foreach($items as $item)

                    <div class="text-center">

                        @if($item->images->first())
                        <a href="{{ route('goods') }}">
                            <img
                                src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                                class="border mb-2 w-full">
                        </a>
                        @endif

                        <p class="text-xs leading-tight">
                            {{ $item->series_name }}
                        </p>

                        <p class="text-xs text-gray-500">
                            {{ $item->char_name }}
                        </p>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>





</x-user-layout>