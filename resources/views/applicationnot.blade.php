<x-user-layout>

    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">




        <div class="flex flex-col items-center justify-center pt-32 px-10 text-center">

            <p class="text-gray-500 font-medium">申請できません。</p>
            <p class="text-gray-400 text-xs mt-2">ログイン後、使用が可能になります。</p>
            {{-- ログインリンク --}}
            <a href="{{ route('login') }}"
                class="mt-10 text-sky-500 font-medium hover:underline">
                ログインする
            </a>
        </div>

    </div>



    </div>

    </div>
</x-user-layout>