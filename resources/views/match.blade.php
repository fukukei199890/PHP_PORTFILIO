<x-user-layout>
    <p>条件がマッチしました！</p>
    <p>あなたは:{{ Auth::user()->name }}</p>
    <p>相手は::{{ $requestData->user->name }}</p>
    <form action="{{ route('match.start_deal') }}" method="post">
        @CSRF
        <button>チャットを開始</button>
    </form>
    </div>
</x-user-layout>
