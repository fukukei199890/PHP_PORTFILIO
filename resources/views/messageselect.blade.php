<x-user-layout>
    <ul>
        @forelse ($requests as $thread)
            <li>    
                {{-- 取引ユーザー --}}
                <p>出品側:{{$thread->receiver->name}}</p>
                <p>送り手:{{ $thread->sender->name }}</p>
                {{-- 相手ユーザーが設定している交換エリア --}}
                <p>{{$thread->sender->user_area}}</p>

                <form method="post" action="{{ route('startTalk') }}">
                    @csrf
                    {{-- thread_idの値をわたす --}}
                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                    <button>トーク開始</button>
                </form>
            </li>
        @empty
            <p>表示できるメッセージがありません</p>
        @endforelse
    </ul>
</x-user-layout>