<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 flex items-center justify-center px-6">

        {{-- カード --}}
        <div class="bg-white border border-gray-100 rounded-[40px] w-full p-10 text-center shadow-lg">
            <h2 class="text-center text-lg py-4  ">交換を完了して<br>よろしいですか?</h2>



            <div class="flex flex-col gap-4 items-center">

                <form method="POST" action="{{ route('exchange.complete') }}" class="w-full flex justify-center">
                    @csrf
                    <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                    <input type="hidden" name="listed_item_id" value="{{ $listed_item_id }}">
                    <button type="submit"
                        class="w-full max-w-[200px] py-3 bg-white border border-gray-300 text-gray-600 font-medium rounded-xl ">
                        はい
                    </button>
                </form>

                {{-- いいえ：戻るリンク --}}
                <a href="{{ route('message', ['thread_id' => $thread_id]) }}"
                    class="w-full max-w-[200px] py-3 bg-white border border-gray-300 text-black font-medium rounded-xl">
                    いいえ
                </a>

            </div>
        </div>
</x-user-layout>
