<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">
        <!-- 見出し -->
        <h2 class="text-center text-lg py-4 border-b text-gray-900 ">メッセージ</h2>


        <div class="divide-y divide-gray-100">
            @forelse ($requests as $thread)
            {{-- 各スレッドのアイテム --}}
            <div class="bg-white hover:bg-gray-50 transition-colors px-6 py-5 flex items-center gap-4">

                {{-- アイコン代わりのアバター --}}
                <div
                    class="shrink-0 w-14 h-14 bg-gray-200 rounded-full flex items-center justify-center border border-gray-300">
                    <img src="{{ $thread->sender->icon_url ?: asset('images/default-icon.png') }}"
                        alt="{{ $thread->sender->name }}さんのアイコン"
                        class="w-full h-full rounded-full object-cover border-2 border-white shadow-sm bg-gray-200">
                </div>

                {{-- コンテンツ --}}
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-baseline mb-1">
                        {{-- 相手の名前（自分が送り手なら受け手、自分が受け手なら送り手を表示するのが一般的ですが、現状は両方表示しています） --}}
                        <p class="text-base font-bold text-gray-900 truncate">
                            {{ $thread->sender->name }}
                        </p>
                        <span
                            class="text-[10px] text-gray-400 font-medium px-2 py-0.5 border border-gray-200 rounded-full uppercase">
                            マッチング中
                        </span>
                    </div>

                    {{-- 交換場所などの補足情報 --}}
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="fa-solid fa-location-dot text-[12px]"></i>
                        <p class="truncate">{{ $thread->sender->user_area ?? '場所未指定' }}</p>
                    </div>

                    <p class="text-[11px] text-gray-400 mt-1">
                        出品者: {{ $thread->receiver->name }}
                    </p>
                </div>

                {{-- 遷移ボタン --}}
                <form method="post" action="{{ route('startTalk') }}" class="shrink-0">
                    @csrf
                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                    <button class="px-4 bg-blue-500 text-white py-1 rounded-md font-semibold hover:bg-blue-600">
                        開く
                    </button>
                </form>
            </div>
            @empty
            {{-- データがない時の表示 --}}
            <div class="flex flex-col items-center justify-center pt-32 px-10 text-center">

                <p class="text-gray-500 font-medium">表示できるメッセージがありません</p>
                <p class="text-gray-400 text-xs mt-2">交換が成立すると、ここにスレッドが表示されます。</p>
            </div>
            @endforelse
        </div>
    </div>
</x-user-layout>