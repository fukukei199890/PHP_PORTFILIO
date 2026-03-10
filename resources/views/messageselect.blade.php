<x-user-layout>
    <ul>
        @forelse ($requests as $thread)
            <li>    
                {{-- 相手ユーザー --}}
                <p>相手ユーザー: {{ $thread->sender->name }}</p>
                {{-- 相手ユーザーが設定している交換エリア --}}
                <p>{{$thread->sender->user_area}}</p>

                <form method="" action="">
                    @csrf
                    <button>トーク開始</button>
                </form>
            </li>
        @empty
            <p>表示できるメッセージがありません</p>
        @endforelse
    </ul>
</x-user-layout>