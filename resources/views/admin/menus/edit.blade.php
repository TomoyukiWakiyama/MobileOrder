<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- メインコンテンツ -->
                    <div> <!-- メニュー一覧 -->
                        <form action="{{route('admin.menus.update', ['menu'=>$menu->id])}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                            <div> <!-- 商品名 -->
                                <label for="name" class="mr-4">商品名</label>
                                <input type="text" name="name" id="name" value="{{$menu->name}}" required>
                            </div>

                            <div> <!-- 商品情報 -->
                                <label for="information" class="mr-4">商品説明</label>
                                <textarea name="information" id="information" required >{{ $menu->information }}</textarea>
                            </div>

                            <div> <!-- 価格 -->
                                <label for="price" class="mr-4">価格</label>
                                <input type="number" name="price" id="price" value="{{$menu->price}}" required >
                            </div>

                            <div> <!-- 一覧画像 -->
                                <label for="frontImage" class="mr-4">一覧画像</label>
                                <input type="file" id="frontImage"name="frontImage"  accept="image/png, image/jpeg, image/jpg" />
                            </div>

                            <div> <!-- カテゴリー -->
                                <label for="category">カテゴリー</label>
                                <select name="category" id="category">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if( $menu->category_id === $category->id ){ selected } @endif required >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div> <!-- 見出し -->
                                <label for="heading">見出し</label>
                                <select name="heading" id="heading">
                                    @foreach ($headings as $heading)
                                    <option value="{{$heading->id}}" @if( $menu->heading_id === $heading->id ){ selected } @endif required >{{ $heading->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div> <!-- 都道府県 -->
                                @foreach ($prefectures as $prefecture)
                                    <label>
                                        <input type="checkbox" name="prefecture_ids[]" value="{{ $prefecture->id }}"
                                            {{ $menu->prefectures->contains($prefecture->id) ? 'checked' : '' }} />
                                        {{ $prefecture->name }}
                                    </label>
                                @endforeach
                            </div>

                            <div> <!-- 戻る&送信ボタン -->
                                <button type="button" onclick="location.href='{{ route('admin.menus.index') }}'">戻る</button>
                                <button type="submit">更新</button>
                            </div>
                        </form>
                    </div> <!-- メニュー一覧 -->
                    <!-- メインコンテンツ_終了 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
