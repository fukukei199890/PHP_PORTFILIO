<x-user-layout>
    @auth
    <x-section-title>メッセージ</x-section-title>
    @endauth

    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">


        <div class="divide-y divide-gray-100">
            @forelse ($requests as $thread)
            @if ($thread->is_matched)
            <!-- 取引中 -->
            {{-- 各スレッドのアイテム --}}
            <div class="bg-white hover:bg-gray-50 transition-colors px-6 py-5 flex items-center gap-4">

                {{-- アイコン代わりのアバター --}}
                <div
                    class="shrink-0 w-14 h-14 bg-gray-200 rounded-full flex items-center justify-center border border-gray-300">
                    @if (Auth::user()->id == $thread->sender->id)
                    <!-- threadのホストが自分 -->
                    <img src="{{ $thread->receiver->icon_url ?: asset('images/default-icon.png') }}"
                        alt="{{ $thread->receiver->name }}さんのアイコン"
                        class="w-full h-full rounded-full object-cover border-2 border-white shadow-sm bg-gray-200">
                    @else
                    <img src="{{ $thread->sender->icon_url ?: asset('images/default-icon.png') }}"
                        alt="{{ $thread->sender->name }}さんのアイコン"
                        class="w-full h-full rounded-full object-cover border-2 border-white shadow-sm bg-gray-200">
                    @endif
                </div>

                {{-- コンテンツ --}}
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-baseline mb-1">
                        {{-- 相手の名前（自分が送り手なら受け手、自分が受け手なら送り手を表示するのが一般的ですが、現状は両方表示しています） --}}
                        <p class="text-base font-bold text-gray-900 truncate flex-1">
                            @if (Auth::user()->id == $thread->sender->id)
                            <!-- 自分がホストの時 -->
                            {{ $thread->receiver->name }}
                            @else
                            {{ $thread->sender->name }}
                            @endif
                        </p>

                        <span
                            class="text-[10px] text-red-500 font-medium px-2 py-0.5 border border-gray-200 rounded-full uppercase">
                            マッチング中
                        </span>
                        <!-- <span
                            class="text-[10px] text-gray-400 font-medium px-2 py-0.5 border border-gray-200 rounded-full uppercase">
                            取引なし
                        </span> -->
                    </div>

                    <p class="text-[11px] text-gray-400 mt-1">
                        @if (Auth::user()->id == $thread->receiver->id)
                        出品者：自分
                        @else
                        出品者：相手
                        @endif
                    </p>
                </div>

                {{-- 遷移ボタン --}}
                <form method="post" action="{{ route('startTalk') }}" class="shrink-0">
                    @csrf
                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">

                    <x-original-button color="emerald" class="w-auto px-10 text-xs font-bold tracking-wider">
                        開く
                    </x-original-button>

                </form>
            </div>
            @endif
            @empty
            {{-- データがない時の表示 --}}
            <div class="flex flex-col items-center justify-center pt-32 px-10 text-center">

                <p class="text-gray-500 font-medium">表示できるメッセージがありません。</p>
                <a href="{{ route('login') }}">
                    <x-original-button color="black" class=" px-10 mt-10">
                        ログインして確認する
                    </x-original-button>
            </div>
            @endforelse
        </div>
    </div>
</x-user-layout>