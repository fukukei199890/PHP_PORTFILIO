<x-user-layout>
    <div class="grid place-items-center pt-10">
        <h1 class="font-mono text-2xl pb-5 border-b">新規登録</h1>
        <form method="post" action="{{ route('registration.store') }}" class="grid place-itemscenter pt-5">
            {{-- ワンタイムトークンをつくるために必要 --}}
            @csrf
            <div>
                <label for="username" class="block font-mono">ユーザー名</label>
                <input type="username" name="username" class="border border-gray-300 rounded-md"></input>
            </div>
            <div>
                <label for="email" class="block font-mono">メールアドレス</label>
                <input type="email" name="email" class="border border-gray-300 rounded-md"></input>
            </div>
            <div>
                <label for="password" class="block font-mono">パスワード</label>
                <input type="password" name="password" class="border border-gray-300 rounded-md"></input>
            </div>
            <div class="flex items-center gap-2 mt-5 ml-3">
                <input type="checkbox" id="agreement" class="cursor-pointer"></input>
                <label for="agreement" class="font-mono">利用規約に同意する</label>
            </div>
            <button type="submit"
                class="mx-auto border border-gray-300 mt-5 w-fit rounded-md bg-blue-600">ログインする</button>
        </form>
    </div>
</x-user-layout>
