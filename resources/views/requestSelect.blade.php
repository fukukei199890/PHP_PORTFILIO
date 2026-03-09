<x-user-layout>
    <ul>
        @foreach($requests as $row)
        <!-- リクエストid -->
        <p>{{ $row->id }}</p>
        <!-- リクエスト者名 -->
        <p>{{ $row->user->name }}</p>
        <form method="get" action="{{ route('requestanswer') }}">
            <button name="request_id" value="{{ $row->id }}">リクエストを受ける</button>
        </form>
        @endforeach
    </ul>
</x-user-layout>