<x-user-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <div class="bg-gray-100 flex flex-col items-center pb-20 min-h-screen">
        <div class="text-center">
            <h2 class="text-3xl font-bold mb-4">交換が完了しました！</h2>
        </div>
        <!-- 画像挿入 -->
        <img src="{{ asset('images/hand.png') }}" alt="" class="w-24 h-24 object-contain mb-6 mx-auto">
        <p class="text-xl mb-8">{{ $user->name ?? 'ゲスト' }}さんとの交換はどうでしたか？</p>
        <form action="ratingsubmit" method="post" class="flex flex-col items-center text-center">
            @csrf {{-- Laravelでフォームを送る時はこれが必要 --}}
            <div class="flex justify-center space-x-2 text-4xl mb-6" id="star-group">
                {{-- 黄色の塗りつぶし星 --}}
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                {{-- グレーの空の星 --}}
                <i class="far fa-star text-gray-300 star-btn"></i>
                <i class="far fa-star text-gray-300 star-btn"></i>
            </div>
        <div class="w-full max-w-sm mb-8 px-4">
            <textarea 
                name="comment" 
                rows="4" 
                placeholder="取引の感想を入力してください（任意）"
                class="w-full p-6 bg-pink-50 border border-gray-300 rounded-xl text-lg leading-relaxed focus:outline-none focus:ring-2 focus:ring-pink-200"
                >大変スムーズな取引でした。また機会があればよろしくお願いいたします。
            </textarea>
        </div>
            <button class="bg-[#e6ddc5] text-black px-10 py-4 rounded-full font-bold">
                相手を評価する
            </button>
        </form>
    </div>

</x-user-layout>