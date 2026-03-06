<x-user-layout>
    
        <div class="min-h-screen bg-gray-100 flex flex-col justify-between">
            <p>お相手が見つかりました</p>
            {{-- 中央エリア --}}
            <div class="flex flex-1 items-center justify-center px-6 pb-24">

                {{-- カード --}}
                <div class="bg-[#e8dddd] border border-[#c9a9a9] 
                    rounded-[40px] 
                    w-full max-w-md 
                    p-10 text-center shadow-sm">

                    {{-- フォーム --}}
                    <!-- route関数はエイリアス（別名）phpのasみたいなもので指定してそのURLを呼び出す -->
                    <form method="get" action="{{ route('rating') }}" class="space-y-6">
                        @csrf

                        {{-- はい --}}
                        <button type="submit"
                            name="action"
                            value="yes"
                            class="w-40 py-3 
                               bg-gray-200 border border-black 
                               rounded-xl 
                               hover:bg-gray-300 transition">
                            はい
                        </button>

                    </form>

                    <form method="get" action="{{ route('message') }}" class="space-y-6">
                        {{-- いいえ --}}
                        <button type="submit"
                            name="action"
                            value="no"
                            class="w-40 py-3 
                               bg-gray-200 border border-black 
                               rounded-xl 
                               hover:bg-gray-300 transition">
                            いいえ
                        </button>
                    </form>
</x-user-layout>