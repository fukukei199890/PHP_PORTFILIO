<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 flex items-center justify-center px-6">

        {{-- カプセル型のカード --}}
        <div class="bg-white border border-gray-100 rounded-[40px] w-full p-10 text-center shadow-xl">

            {{-- アイコンなどを入れるとより親切 --}}
            <div class="mb-6">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800 leading-relaxed" style="font-family: 'Zen Maru Gothic', sans-serif;">
                    交換を完了して<br>よろしいですか？
                </h2>
                <p class="text-xs text-gray-400 mt-2" style="font-family: 'Zen Maru Gothic', sans-serif;">完了するとメッセージの送受信ができなくなります</p>
            </div>

            <div class="flex flex-col gap-4 items-center">

                {{-- はい：エメラルドのボタン --}}
                <form method="POST" action="{{ route('exchange.complete') }}" class="w-full">
                    @csrf
                    <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                    <input type="hidden" name="listed_item_id" value="{{ $listed_item_id }}">

                    {{-- 以前作成したoriginal-buttonにcolor="emerald"のような機能がなければ、直接クラス指定します --}}
                    <x-original-button color="emerald" class="w-auto px-10">
                        完了する
                    </x-original-button>
                </form>

                {{-- いいえ：戻るリンク（控えめなデザイン） --}}
                <a href="{{ route('message', ['thread_id' => $thread_id]) }}"
                    class="w-full py-4 bg-gray-50 text-gray-500 font-bold rounded-2xl border border-gray-100 hover:bg-gray-100 transition-all text-base"
                    style="font-family: 'Zen Maru Gothic', sans-serif;">
                    いいえ、戻ります
                </a>

            </div>
        </div>
    </div>
</x-user-layout>