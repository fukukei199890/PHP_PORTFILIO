<x-user-layout>
    <!-- ログイン情報 -->
    <h1 class="text-center text-3xl font-bold">マイページ</h1>
    <div class="flex">
        <img src="{{ Auth::user()->icon_url }}" alt="ユーザーアイコン"
            class="item-center rounded-full objectcover">
        <div class="flex flex-col text-2xl">
            <p>{{ Auth::user()->name }}</p>
            <p>★:{{ $score }}</p>
        </div>
    </div>
    <div class="flex justify-center">
    <!-- aタグのclass
     1、2行目ボタンの見た目
     3、4行目クリック時、フォーカス時の見た目 -->
        <a href="{{ route('profile.edit') }}"
        class="inline-flex items-center px-8 py-2  border border-transparent rounded-md
        font-semibold text-sm text-white tracking-widest
        hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            プロフィールを編集する
        </a>
    </div>
    <div class="grid grid-cols-2 gap-8 m-6 justify-items-center">
        <!-- TODO 出品中、取引完了、お気に入りの画面遷移 -->
        <form method="get" action="" class="item-center">
            <button class="font-mono rounded-full bg-blue-600 text-white p-4">出品中</button>
        </form>
        <form method="get" action="" class="item-center">
            <button class="font-mono rounded-full bg-blue-600 text-white p-4">取引完了</button>
        </form>
    </div>
    <form action="get" action="" class="m-6">
        <button class="font-mono">お気に入りに登録した商品</button>
    </form>
    <form method="get" action="{{ route('agreements') }}" class="m-6">
        <button class="font-mono">利用規約</button>
    </form>
    <form method="get" action="{{ route('privacy') }}" class="m-6">
        <button class="font-mono">プライバシーポリシー</button>
    </form>
    <form method="get" action="{{ route('inquirery') }}" class="m-6">
        <button class="font-mono">お問い合わせ</button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="text-center">
        @csrf

        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        this.closest('form').submit();"
            class="text-red-600 hover:underline text-center">
            ログアウト
        </a>
    </form>
</x-user-layout>