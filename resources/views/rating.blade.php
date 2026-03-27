<x-user-layout>

    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <div class="bg-gray-50 flex flex-col items-center justify-center min-h-screen px-6 py-12">
        <div class="mt-8 pb-4 text-gray-600 font-bold flex items-center gap-x-3">
            {{ $user->name ?? 'ゲスト' }} さんの評価
            <!-- 福田追加 -->
            <img src="{{ $user->icon_url ?? asset('images/default-icon.png') }}" alt="icon"
                class="w-12 h-12 rounded-full object-cover border border-gray-200">
        </div>

        <div class="text-center">
            <h2 class="text-3xl font-bold mb-4">交換が完了しました！</h2>
        </div>

        <!-- 画像挿入 -->
        <!-- <img src="{{ asset('images/hand.png') }}" alt="" class="w-24 h-24 object-contain mb-6 mx-auto"> -->
        <p class="text-base mb-8">{{ $user->name ?? 'ゲスト' }}さんとの交換はどうでしたか？</p>

        <form action="{{ route('rating.store') }}" method="post" class="flex flex-col items-center text-center">
            @csrf {{-- Laravelでフォームを送る時はこれが必要 --}}
            {{-- 追加：評価対象のユーザーIDを送信する --}}
            <input type="hidden" name="reviewed_user_id" value="{{ $user->id }}">
            <input type="hidden" name="thread_id" value="{{ $thread_id }}">
            <input type="hidden" name="rating" id="rating-value" value="0">
            <div class="flex justify-center space-x-2 text-4xl mb-6 cursor-pointer" id="star-group">
                <i class="far fa-star text-gray-300 star-btn" data-num="1"></i>
                <i class="far fa-star text-gray-300 star-btn" data-num="2"></i>
                <i class="far fa-star text-gray-300 star-btn" data-num="3"></i>
                <i class="far fa-star text-gray-300 star-btn" data-num="4"></i>
                <i class="far fa-star text-gray-300 star-btn" data-num="5"></i>
                <script>
                    const stars = document.querySelectorAll('.star-btn');
                    const ratingInput = document.getElementById('rating-value');

                    stars.forEach(star => {
                        star.addEventListener('click', () => {
                            const num = star.getAttribute('data-num'); // 1〜5を取得
                            ratingInput.value = num; // 隠し箱に数字を入れる

                            // 星の色を更新する
                            stars.forEach(s => {
                                if (s.getAttribute('data-num') <= num) {
                                    s.classList.remove('far', 'text-gray-300');
                                    s.classList.add('fas', 'text-yellow-400'); // 塗りつぶす
                                } else {
                                    s.classList.remove('fas', 'text-yellow-400');
                                    s.classList.add('far', 'text-gray-300'); // 空にする
                                }
                            });
                        });
                    });
                </script>
            </div>
            <!-- <div class="flex justify-center space-x-2 text-4xl mb-6" id="star-group">
                {{-- 黄色の塗りつぶし星 --}}
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                {{-- グレーの空の星 --}}
                <i class="far fa-star text-gray-300 star-btn"></i>
                <i class="far fa-star text-gray-300 star-btn"></i>
            </div> -->
            <div class="w-full max-w-sm mb-8 px-4">
                <textarea name="comment" rows="4" required placeholder="（例）大変スムーズな取引でした。また機会があればよろしくお願いいたします。"
                    class="w-full p-5 bg-gray-50 border border-gray-200 rounded-2xl text-base leading-relaxed focus:outline-none focus:ring-2 focus:ring-gray-200 focus:bg-white transition placeholder-gray-400"></textarea>
            </div>
            <button
                class="px-10 bg-blue-500 text-white py-3 rounded-full font-semibold shadow-md hover:bg-blue-600 transition-all hover:shadow-lg active:scale-95">
                相手を評価する
            </button>
        </form>
    </div>
</x-user-layout>
