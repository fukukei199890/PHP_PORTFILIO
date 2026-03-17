<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-white flex flex-col items-center justify-center px-6">

        {{-- マッチングアイコン（中央の円） --}}
        <div class="mb-8 flex items-center justify-center">
            <div class="relative flex items-center">
                {{-- あなたのアイコン（仮） --}}
                <div class="w-20 h-20 bg-gray-100 border-2 border-gray-900 rounded-full flex items-center justify-center z-10 shadow-sm">
                    <img src="{{ Auth::user()->icon_url ?: asset('images/default-icon.png') }}"
                        alt="ユーザーアイコン"
                        class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm bg-gray-200">
                </div>



                {{-- 相手のアイコン --}}
                <div class="w-20 h-20 bg-gray-50 border-2 border-gray-300 rounded-full flex items-center justify-center z-10 shadow-sm">
                    <img src="{{ $requestData->user->icon_url ?: asset('images/default-icon.png') }}"
                        alt="{{ $requestData->user->name }}さんのアイコン"
                        class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm bg-gray-200">
                </div>
            </div>
        </div>

        {{-- テキストエリア --}}
        <div class="text-center space-y-2 mb-10">
            <h1 class="text-2xl font-black text-gray-900 tracking-tighter italic uppercase">Match!</h1>
            <p class="text-sm text-gray-500 font-medium">条件がマッチしました！</p>
        </div>

        {{-- ユーザー名の比較 --}}
        <div class="w-full bg-gray-50 rounded-3xl p-6 mb-12 border border-gray-100">
            <div class="flex flex-col gap-4">
                <div class="flex justify-between items-center">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">あなた</span>
                    <span class="text-lg font-bold text-gray-900">{{ Auth::user()->name }}</span>
                </div>

                <div class="border-t border-dashed border-gray-200"></div>

                <div class="flex justify-between items-center">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">お相手</span>
                    <span class="text-lg font-bold text-gray-900">{{ $requestData->user->name }}</span>
                </div>
            </div>
        </div>

        {{-- アクションボタン --}}
        <div class="w-full space-y-4">

            <form action="{{ route('match.start_deal') }}" method="post" class="w-full flex justify-center">
                @csrf
                <input type="hidden" name="request_id" value="{{ $requestData->id }}">
                <input type="hidden" name="thread_id" value="{{ $current_thread->id }}">

                <button type="submit"
                    class="w-full max-w-[280px] bg-blue-500 text-white py-3.5 rounded-full font-bold hover:bg-blue-600 shadow-md transition-all active:scale-95">
                    取引を開始する
                </button>
            </form>
        </div>

    </div>
</x-user-layout>