<x-user-layout>
    <!-- ログイン情報 -->
    <p>{{Auth::user()->id }}</p>
    <p>{{Auth::user()->name }}</p>
    <p>{{Auth::user()->email }}</p>
    <p>{{Auth::user()->password }}</p>
    <p>{{Auth::user()}}</p>
</x-user-layout>