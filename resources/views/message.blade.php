<x-user-layout>
    {{-- 警告ヘッダー --}}
    <div class="bg-gray-900 text-white text-[10px] sm:text-xs py-2 px-4 shadow-sm flex justify-between items-center">
        <span class="flex items-center gap-1">
            <span class="text-yellow-400">⚠️</span> 出会い目的・犯罪行為・詐欺は即時アカウント停止対象となります
        </span>

    </div>

    <div class="max-w-2xl mx-auto min-h-screen flex flex-col bg-gray-100">

        {{-- メッセージ表示エリア --}}
        <div class="flex-1 p-4 sm:p-6">
            <div class="space-y-6">
                @isset($message_data)
                @foreach ($message_data as $row)
                @if ($row->user_id == Auth::user()->id)
                {{-- 自分の投稿（右側） --}}
                <div class="flex flex-col items-end" x-data="{ isEditing: false, isDeleting: false }">
                    <template x-if="!isEditing && !isDeleting">
                        <div class="group flex flex-col items-end max-w-[85%]">
                            <div class="bg-blue-600 text-white rounded-2xl rounded-tr-none px-4 py-2 shadow-sm">
                                <p class="text-sm leading-relaxed whitespace-pre-wrap">{{ $row->message_text }}</p>
                            </div>
                            <div class="flex gap-3 mt-1 px-1">
                                <button @click="isEditing = true" class="text-[11px] text-gray-400 hover:text-blue-600 transition">編集</button>
                                <button @click="isDeleting = true" class="text-[11px] text-gray-400 hover:text-red-500 transition">削除</button>
                            </div>
                        </div>
                    </template>

                    {{-- 編集中の表示 --}}
                    <template x-if="isEditing">
                        <div class="w-full max-w-xs bg-white p-3 rounded-lg shadow-md border border-blue-200">
                            <form method="post" action="{{ route('message.update') }}" class="space-y-2">
                                @csrf
                                <input type="hidden" name="messageId" value="{{ $row->id }}">
                                <textarea name="messageText" class="w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" rows="2">{{ $row->message_text }}</textarea>
                                <div class="flex justify-end gap-2">
                                    <button @click="isEditing = false" type="button" class="text-xs text-gray-500 px-2 py-1">中止</button>
                                    <button type="submit" class="text-xs bg-blue-600 text-white px-3 py-1 rounded-md">保存</button>
                                </div>
                            </form>
                        </div>
                    </template>

                    {{-- 削除確認 --}}
                    <template x-if="isDeleting">
                        <div class="bg-red-50 p-3 rounded-lg border border-red-200 text-right">
                            <p class="text-xs text-red-600 mb-2">このメッセージを削除しますか？</p>
                            <div class="flex justify-end gap-3">
                                <button @click="isDeleting = false" class="text-xs text-gray-500">キャンセル</button>
                                <form method="post" action="{{ route('message.delete') }}">
                                    @csrf
                                    <input type="hidden" name="messageId" value="{{ $row->id }}">
                                    <button type="submit" class="text-xs font-bold text-red-600">削除する</button>
                                </form>
                            </div>
                        </div>
                    </template>
                </div>
                @else
                {{-- 相手の投稿（左側） --}}
                <div class="flex justify-start items-start gap-2.5">
                    <img src="{{ $row->user->icon_url ?? asset('images/default-icon.png') }}" alt="icon"
                        class="w-9 h-9 rounded-full object-cover border border-white shadow-sm flex-shrink-0">
                    <div class="max-w-[85%]">
                        <p class="text-[11px] text-gray-500 ml-1 mb-1">{{ $row->user->name }}</p>
                        <div class="bg-white text-gray-800 rounded-2xl rounded-tl-none px-4 py-2 shadow-sm border border-gray-100">
                            <p class="text-sm leading-relaxed whitespace-pre-wrap">{{ $row->message_text }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                <div class="flex flex-col items-center justify-center py-20 opacity-40">
                    <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <p class="text-sm">メッセージを送りましょう</p>
                </div>
                @endisset
            </div>
        </div>

        {{-- 入力・アクションエリア（下部固定） --}}
        <div class="sticky bottom-0 bg-white border-t border-gray-200 p-4 space-y-3">
            <form method="post" action="{{ route('create_message') }}" class="flex gap-2">
                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                <input type="text" name="message_text" placeholder="メッセージを入力..." required
                    class="flex-1 bg-gray-50 border border-gray-300 rounded-full px-5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white p-2.5 rounded-full transition-transform active:scale-95 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </form>

            <div class="flex flex-col items-center gap-3">
                <p class="text-[10px] text-gray-400">※ボタン連打により送信が失敗する場合があります</p>
                <form method="post" action="{{ route('message.complete') }}" class="w-full">
                    @csrf
                    <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                    <button type="submit"
                        class="w-full bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 hover:text-blue-600 hover:border-blue-600 text-sm font-bold py-2.5 rounded-lg transition duration-200 shadow-sm">
                        取引を完了する
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-user-layout>