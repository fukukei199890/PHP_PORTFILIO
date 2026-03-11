<x-user-layout>
    <div>
        <form method="post" action="{{ route('search.result') }}">
            @csrf
            <input type="text" name="search" placeholder="キーワード検索"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            <div>
                <label>開封</label>
                <input type="radio" id="opend" name="is_opened" value="1">
                <label>未開封</label>
                <input type="radio" id="not_opend" name="is_opened" value="0">
            </div>
            <button class="text-white bg-indigo-500 py-2 px-8 hover:bg-indigo-600 rounded text-lg w-full">検索</button>
        </form>
        @isset($results) {{-- $resultsの存在を確認 --}}          
            @if($results->isEmpty())  {{-- $resultsの値が空でないかを確認 --}}
            <p>検索結果なし</p>
            @else        
            <div>
                @foreach ($results as $row)
                    <div>
                        {{-- ブラウザからはpublicフォルダがルートとして扱われる --}}
                        {{-- null安全演算子 --}}
                        {{-- 左辺がnullの時プロパティを実行せずnullを返す --}}
                        <img class="w-32" src="{{ asset('storage/'.$row->images->first()?->image_url) }}">
                        <div>
                            {{-- ListedItem --}}
                            <p>series:{{ $row->series_name }}</p>
                            <p>name:{{ $row->char_name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        @endisset
    </div>
</x-user-layout>
