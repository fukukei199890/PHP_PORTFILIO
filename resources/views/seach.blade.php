<x-user-layout>
    <div>
        <form method="post" action="{{ route('search.result') }}">
            @csrf
            <input type="text" name="search" placeholder="キーワード検索"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8">
            <div>
                <label>開封</label>
                <input type="radio" id="opend" name="is_opened">
                <label>未開封</label>
                <input type="radio" id="not_opend" name="is_opend">
            </div>
            <button class="text-white bg-indigo-500 py-2 px-8 hover:bg-indigo-600 rounded text-lg w-full">検索</button>
            <div>
                @if (isset($results))
                    @foreach ($results as $row)
                        <div>
                            {{-- ブラウザからはpublicフォルダがルートとして扱われる --}}
                            <img class="w-32" src="{{ asset('images/test/test.jpg') }}">
                            <div>
                                {{-- ListedItem->itemプロパティ --}}
                                <p>series:{{ $row->item->series_name }}</p>
                                <p>name:{{ $row->item->char_name }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </form>
    </div>
</x-user-layout>
