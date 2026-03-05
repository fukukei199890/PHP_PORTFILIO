<x-user-layout>

    <div class="max-w-md mx-auto lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col w-full mt-10">

        <h2 class="text-gray-900 text-lg font-medium title-font mb-5">ログイン</h2>

        <form method="get" action="">
            @csrf

            <div class="relative mb-4">
                <label class="leading-7 text-sm text-gray-600">メールアドレス</label>
                <input
                    type="email"
                    name="email"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            </div>

            <div class="relative mb-4">
                <label class="leading-7 text-sm text-gray-600">パスワード</label>
                <input
                    type="password"
                    name="password"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            </div>

            <div class="flex justify-end mb-6">
                <a href="#" class="text-sky-600 text-sm hover:underline">
                    お忘れですか？
                </a>
            </div>

            <button class="text-white bg-indigo-500 py-2 px-8 hover:bg-indigo-600 rounded text-lg w-full">
                ログインする
            </button>

        </form>

        <div class="text-center mt-8">
            <a href="{{ route('registration') }}" class="text-sky-600 hover:underline">
                初めての方はコチラ
            </a>
        </div>

    </div>

</x-user-layout>