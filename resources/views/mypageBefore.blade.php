<x-user-layout>
    <div class="grid place-items-center m-10">
        <h2 class="font-mono">マイページ</h2>
        <div class="grid grid-cols-2 gap-8 m-6">
            <form method="get" action="{{ route('userlogin') }}">
                <button class="font-mono rounded-full bg-blue-600 text-white p-4">ログイン</button>
            </form>
            <form method="get" action="{{ route('registration') }}">
                <button class="font-mono rounded-full bg-blue-600 text-white p-4">新規登録</button>
            </form>
        </div>
        <form method="get" action="{{ route('agreements') }}" class="m-6">
            <button class="font-mono">利用規約</button>
        </form>
        <form method="get" action="{{ route('privacy') }}" class="m-6">
            <button class="font-mono">プライバシーポリシー</button>
        </form>
    </div>
</x-user-layout>