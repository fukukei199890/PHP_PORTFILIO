<x-user-layout>
    <div class="max-w-2xl mx-auto p-4 bg-gray-50 min-h-screen">
        {{-- メッセージ表示エリア --}}
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            @isset($message_data)
            <div class="space-y-4">
                @foreach ($message_data as $row)
                @if ($row->user_id == Auth::user()->id)
                {{-- 自分の投稿（右側） --}}
                <div class="flex justify-end">
                    <div class="bg-blue-500 text-white rounded-2xl px-4 py-2 max-w-xs shadow-sm">
                        <!-- <p class="text-xs opacity-75 mb-1">あなた</p> -->
                        <p class="text-sm">{{ $row->message_text }}</p>
                    </div>
                </div>
                @else
                {{-- 相手の投稿（左側） --}}
                <div class="flex justify-start">
                    <div class="bg-gray-200 text-gray-800 rounded-2xl px-4 py-2 max-w-xs shadow-sm">
                        <p class="text-xs text-gray-500 mb-1">ID: {{ $row->user_id }}</p>
                        <p class="text-sm">{{ $row->message_text }}</p>
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