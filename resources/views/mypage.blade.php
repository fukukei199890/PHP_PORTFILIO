<x-user-layout>
    <!-- ログイン情報 -->
    <p>{{ Auth::user()->name }}</p>
    <p>評価;{{ $score }}</p>
    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        プロフィールを編集する
    </a>
    <div class="grid grid-cols-2 gap-8 m-6">
        <form method="get" action="">
            <button class="font-mono rounded-full bg-blue-600 text-white p-4">出品中</button>
        </form>
        <form method="get" action="">
            <button class="font-mono rounded-full bg-blue-600 text-white p-4">取引完了</button>
        </form>
    </div>
    <form method="get" action="{{ route('agreements') }}" class="m-6">
        <button class="font-mono">利用規約</button>
    </form>
    <form method="get" action="{{ route('privacy') }}" class="m-6">
        <button class="font-mono">プライバシーポリシー</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        this.closest('form').submit();"
            class="text-red-600 hover:underline">
            ログアウト
        </a>
    </form>
</x-user-layout>