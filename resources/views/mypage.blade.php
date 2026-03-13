<x-user-layout>
    <div class="max-w-md mx-auto">
        <h1 class="text-center text-3xl font-bold my-4">マイページ</h1>

        <div class="bg-red-50 p-6 rounded-lg shadow-sm">
     
            <form action="{{ route('profile.update_icon') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                @csrf
                @method('PATCH')

                <div class="flex items-center w-full">
                    <div class="relative">
                        <img src="{{ Auth::user()->icon_url ?: asset('images/default-icon.png') }}" 
                             alt="ユーザーアイコン"
                             class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md">
                    </div>
                    
                    <div class="ml-4 flex flex-col justify-center">
                        <p class="text-xl font-bold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-lg text-yellow-600 font-semibold">★{{ $score }}</p>
                    </div>
                </div>

                <div class="w-full mt-4 border-t border-red-100 pt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">アイコンを変更する</label>
                    <div class="flex items-center space-x-2">
                        <input type="file" name="icon" 
                               class="block w-full text-xs text-gray-500
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-full file:border-0
                               file:text-xs file:font-semibold
                               file:bg-gray-200 file:text-gray-700
                               hover:file:bg-gray-300"/>
                        <button type="submit" class="bg-gray-800 text-white text-xs px-3 py-2 rounded-md hover:bg-black transition">
                            更新
                        </button>
                    </div>
                    @error('icon')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('profile.edit') }}"
               class="w-full text-center py-2 bg-gray-300 text-gray-800 rounded-md font-semibold text-sm hover:bg-gray-400 transition">
                プロフィールを変更する
            </a>
        </div>

        <div class="grid grid-cols-3 gap-2 mt-6 px-2">
            <a href="#" class="bg-red-300 text-center py-4 rounded text-sm font-bold hover:opacity-80">
                出品中(12)
            </a>
            <a href="#" class="bg-red-300 text-center py-4 rounded text-sm font-bold hover:opacity-80">
                取引中(2)
            </a>
            <a href="#" class="bg-red-300 text-center py-4 rounded text-sm font-bold hover:opacity-80">
                取引完了
            </a>
        </div>

        <div class="mt-8 border-t border-gray-100">
            <a href="#" class="flex items-center justify-between py-4 border-b border-gray-100 px-2 hover:bg-gray-50">
                <span class="flex items-center"><span class="mr-2">👍</span> お気に入りに登録した商品</span>
            </a>
            <a href="{{ route('agreements') }}" class="flex items-center justify-between py-4 border-b border-gray-100 px-2 hover:bg-gray-50">
                <span>利用規約</span>
                <span class="text-gray-400">＞</span>
            </a>
            <a href="{{ route('privacy') }}" class="flex items-center justify-between py-4 border-b border-gray-100 px-2 hover:bg-gray-50">
                <span>プライバシーポリシー</span>
                <span class="text-gray-400">＞</span>
            </a>
            <a href="{{ route('inquirery') }}" class="flex items-center justify-between py-4 border-b border-gray-100 px-2 hover:bg-gray-50">
                <span>お問い合わせ</span>
                <span class="text-gray-400">＞</span>
            </a>
        </div>

        <div class="mt-8 mb-20">
            <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
                @csrf
                <button type="submit" class="w-2/3 py-3 bg-red-50 border border-red-200 text-gray-800 rounded-md hover:bg-red-100 transition">
                    ログアウト
                </button>
            </form>
        </div>
    </div>
</x-user-layout>