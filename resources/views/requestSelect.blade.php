<x-user-layout>
    <ul>
        @foreach($requests as $row)
        <p>{{ $row->user->name }}</p>
        <form method="get" action="{{ route('requestanswer') }}">
            <button>リクエストを受ける</button>
        </form>
        @endforeach
    </ul>
</x-user-layout>