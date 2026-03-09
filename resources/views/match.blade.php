<x-user-layout>
    <p>条件がマッチしました！</p>
    <p>{{ $request_id }}</p>
    <p>あなたは:{{ Auth::user()->name }}</p>
    <p>相手は::{{$user_name }}</p>
    <form action="{{ route('match.start_deal') }}" method="post">
        @CSRF
        <button>チャットを開始</button>
    </form>
    </div>
</x-user-layout>