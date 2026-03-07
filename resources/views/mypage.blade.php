<x-user-layout>
    <!-- ログイン情報 -->
    <p>{{ Auth::user()->name }}</p>
    <p>{{ $score }}</p>
</x-user-layout>