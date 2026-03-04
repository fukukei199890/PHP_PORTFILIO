<x-user-layout>
    <div class="grid place-items-center h-screen">
        <h2 class="font-serif text-base">マイページ</h2>
        <div class="grid grid-cols-2">
            <form action="{{ route("login") }}" method="get">
                <button class="font-serif">ログイン</button>
            </form>

            <form action="#" method="get">
                <button>新規登録</button>
            </form>
        </div>












    </div>
</x-user-layout>