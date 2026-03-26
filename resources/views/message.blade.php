<x-user-layout>
    <div
        class="bg-gray-800 text-white text-[10px] py-2 px-4 rounded-md mb-6 shadow-md flex justify-between items-center">
        <span>⚠️ 出会い目的・犯罪行為・詐欺は即時アカウント停止対象となります</span>
        <span class="opacity-70">監視システム稼働中</span>
    </div>
    <div class="max-w-2xl mx-auto p-4 bg-gray-50 min-h-screen">
        {{-- メッセージ表示エリア --}}
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            @isset($message_data)
                <div class="space-y-4">
                    @foreach ($message_data as $row)
                        @if ($row->user_id == Auth::user()->id)
                            {{-- 自分の投稿（右側） --}}
                            <div x-data="{ isEditing: false, isDeleting: false }">
                                <template x-if="!isEditing && !isDeleting">
                                    {{-- 通常の表示 --}}
                                    <div class="flex flex-col justify-end">
                                        <div class="bg-blue-500 text-white rounded-2xl px-4 py-2 max-w-xs shadow-sm">
                                            <!-- <p class="text-xs opacity-75 mb-1">あなた</p> -->
                                            <p class="text-sm">{{ $row->message_text }}</p>
                                        </div>
                                        <ul class="flex gap-3 text-xs">
                                            <li>
                                                <button @click="isEditing = true" type="submit">edit</button>
                                            </li>
                                            <li class="text-red-500">
                                                <button @click="isDeleting = true" type="submit">delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </template>
                                <template x-if="isEditing">
                                    {{-- 編集中の表示 --}}
                                    <div>
                                        <form method="post" action="{{ route('message.update') }}">
                                            @csrf
                                            <input type="hidden" name="messageId" value="{{ $row->id }}">
                                            <input type="text" name="messageText" value="{{ $row->message_text }}">
                                            <button type="submit">編集完了</button>
                                        </form>
                                        <button @click="isEditing = false" type="submit">編集中止</button>
                                    </div>
                                </template>
                                <template x-if="isDeleting">
                                    <div class="flex flex-col justify-end">
                                        <div class="bg-blue-500 text-white rounded-2xl px-4 py-2 max-w-xs shadow-sm">
                                            <!-- <p class="text-xs opacity-75 mb-1">あなた</p> -->
                                            <p class="text-sm">{{ $row->message_text }}</p>
                                        </div>
                                        <ul class="flex gap-3 text-xs">
                                            <li class="text-red-500">
                                                <form method="post" action="{{ route('message.delete') }}">
                                                    @csrf
                                                    <input type="hidden" name="messageId" value="{{ $row->id }}">
                                                    <button type="submit">削除実行</button>
                                                </form>
                                            </li>
                                            <li>
                                                <button @click="isDeleting = false" type="submit">削除中止</button>
                                            </li>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                        @else
                            {{-- 相手の投稿（左側） --}}
                            <div class="flex justify-start items-end space-x-2">
                                {{-- アイコン画像 --}}
                                <img src="{{ $row->user->icon_url ?? asset('images/default-icon.png') }}" alt="icon"
                                    class="w-8 h-8 rounded-full object-cover border border-gray-200">
                                <div>
                                    {{-- 名前（メッセージの上に小さく表示） --}}
                                    <p class="text-xs text-gray-500 ml-1 mb-1">{{ $row->user->name }}</p>
                                    {{-- メッセージ --}}
                                    <div class="bg-gray-200 text-gray-800 rounded-2xl px-4 py-2 max-w-xs shadow-sm">
                                        <p class="text-sm">{{ $row->message_text }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-400 my-10">メッセージを書き込んでください</p>
            @endisset
        </div>
        {{-- 入力・アクションエリア --}}
        <div class="space-y-4">
            {{-- メッセージ投稿フォーム --}}
            <form method="post" action="{{ route('create_message') }}" class="flex gap-2">
                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                <input type="text" name="message_text" placeholder="メッセージを入力..."
                    class="flex-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-200">
                    送信
                </button>
            </form>
            <p>※送信ボタンを連打するとメッセージを送れない場合があります</p>

            {{-- 取引完了ボタン --}}
            <form method="post" action="{{ route('message.complete') }}" class="text-center">
                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                <button type="submit"
                    class="w-full bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-bold py-2 px-4 rounded-md transition duration-200">
                    取引を完了する
                </button>
            </form>
        </div>
    </div>
</x-user-layout>
