<x-user-layout>
    <div class="max-w-2xl mx-auto p-4">
        <!-- 見出し -->
        <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">
            通知一覧
        </h2>
        <ul class="space-y-4 mb-6">
            @foreach (Auth::user()->unreadNotifications as $notification)
            <li class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <p class="text-gray-700">
                    <span class="font-bold">{{ $notification->data['sender_name'] }}</span>からのメッセージがあります
                </p>

                <form method="post" action="{{ route('messageReceived.read', $notification->id) }}" class="m-0">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="sender_id" value="{{ $notification->data['sender_id'] }}">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition-colors">
                        確認
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</x-user-layout>