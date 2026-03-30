<x-user-layout>
    {{-- 1. 警告ヘッダー --}}
    <div class="bg-gray-800 text-white text-[16px] py-2 px-4 flex justify-between">
        <span>⚠️ 出会い目的・詐欺は禁止です</span>
        <span class="opacity-50 text-[8px]">監視中</span>
    </div>

    {{-- 2. 全体のレイアウト --}}
    <div class="max-w-2xl mx-auto min-h-screen bg-white flex flex-col border-x border-gray-100 shadow-sm">

        {{-- 3. メッセージ表示エリア --}}
        <div class="flex-1 p-4 space-y-6">
            @isset($message_data)
                @foreach ($message_data as $row)
                    @if ($row->user_id == Auth::user()->id)
                        {{-- 【自分】右側に寄せる --}}
                        <div class="flex flex-col items-end" x-data="{ isEditing: false, isDeleting: false }">
                            <template x-if="!isEditing && !isDeleting">
                                <div class="flex flex-col items-end max-w-[85%]">
                                    {{-- メッセージ本体（角を少し丸めに） --}}
                                    <div class="bg-blue-500 text-white rounded-2xl px-4 py-2 shadow-sm">
                                        <p class="text-sm">{{ $row->message_text }}</p>
                                    </div>
                                    {{-- 操作リンク --}}
                                    <div class="flex gap-3 mt-1 mr-1">
                                        <button @click="isEditing = true"
                                            class="text-[10px] text-gray-400 hover:text-blue-500">編集</button>
                                        <button @click="isDeleting = true"
                                            class="text-[10px] text-red-300 hover:text-red-500">削除</button>
                                    </div>
                                </div>
                            </template>

                            {{-- 【自分】編集・削除モード（シンプルに維持） --}}
                            <template x-if="isEditing">
                                <div class="w-full bg-gray-50 p-3 rounded-xl border border-blue-100">
                                    <form method="post" action="{{ route('message.update') }}" class="flex flex-col gap-2">
                                        @csrf
                                        <input type="hidden" name="messageId" value="{{ $row->id }}">
                                        <input type="text" name="messageText" value="{{ $row->message_text }}"
                                            class="border rounded-lg text-sm p-2 focus:ring-2 focus:ring-blue-400 outline-none">
                                        <div class="flex justify-end gap-2">
                                            <button @click="isEditing = false" type="button"
                                                class="text-xs text-gray-400 px-3 py-1">中止</button>
                                            <button type="submit"
                                                class="text-xs bg-blue-500 text-white px-4 py-1 rounded-full font-bold shadow-sm">保存</button>
                                        </div>
                                    </form>
                                </div>
                            </template>

                            <template x-if="isDeleting">
                                <div class="flex gap-3 items-center bg-red-50 p-3 rounded-xl border border-red-100">
                                    <span class="text-xs text-red-500 font-bold">削除しますか？</span>
                                    <form method="post" action="{{ route('message.delete') }}">
                                        @csrf
                                        <input type="hidden" name="messageId" value="{{ $row->id }}">
                                        <button type="submit"
                                            class="text-xs bg-red-500 text-white px-4 py-1 rounded-full font-bold shadow-sm text-nowrap">実行</button>
                                    </form>
                                    <button @click="isDeleting = false" class="text-xs text-gray-400 px-1">中止</button>
                                </div>
                            </template>
                        </div>
                    @else
                        {{-- 【相手】左側に寄せる --}}
                        <div class="flex items-start gap-2 max-w-[85%]">
                            <img src="{{ $row->user->icon_url ?? asset('images/default-icon.png') }}"
                                class="w-9 h-9 rounded-full border border-gray-100 shadow-sm">
                            <div>
                                <p class="text-[10px] text-gray-400 mb-1 ml-1">{{ $row->user->name }}</p>
                                <div class="bg-gray-100 text-gray-700 rounded-2xl px-4 py-2 shadow-sm">
                                    <p class="text-sm">{{ $row->message_text }}</p>
                                </div>
                            </div>
                            @if (session('received_at') && $row->created_at > session('received_at'))
                                <span
                                    class="absolute -right-10 top-1/2 -translate-y-1/2 bg-red-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded shadow-sm animate-pulse">
                                    未読
                                </span>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endisset
        </div>

        {{-- 4. 入力・ボタンエリア（下部に固定） --}}
        <div class="p-4 border-t bg-white sticky bottom-0 z-20">
            {{-- メッセージ送信 --}}
            <form method="post" action="{{ route('create_message') }}" class="flex gap-2 mb-4">
                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                <input type="text" name="message_text" placeholder="メッセージを入力..." required
                    class="flex-1 bg-gray-50 border border-gray-200 rounded-full px-5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-md transition-colors active:scale-95">
                    送信
                </button>
            </form>
            {{-- 取引完了 --}}
            <form method="post" action="{{ route('message.complete') }}"
                class="mt-6 pt-4 border-t-2 border-dashed border-gray-100">
                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread_id }}">

                <div class="flex flex-col gap-2 mb-3">
                    <label class="text-[12px] font-bold text-gray-500 ml-1 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        完了する取引アイテムを選択
                    </label>

                    <div class="relative">
                        <select
                            class="w-full bg-gray-50 border border-emerald-200 text-gray-700 text-sm rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-400 focus:outline-none appearance-none cursor-pointer transition-all hover:bg-white"
                            name="listed_item_id">
                            @foreach ($trading_items as $row)
                                <option value="{{ $row->id }}">📦 {{ $row->series_name }}</option>
                            @endforeach
                        </select>
                        {{-- カスタム矢印アイコン --}}
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <x-original-button color="emerald"
                    class="w-full py-3 shadow-lg hover:shadow-emerald-100 active:scale-[0.98] transition-all">
                    <span class="flex items-center justify-center gap-2">
                        チェックしたアイテムの取引を完了する
                    </span>
                </x-original-button>
            </form>
            <p class="text-[16px] text-gray-400 text-center mt-2">※連打に注意してください</p>
        </div>
    </div>
</x-user-layout>
