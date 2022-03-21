<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- メインコンテンツ -->
                    <div> <!-- メニュー一覧 -->
                        <button type="button" onclick="location.href='{{ route('admin.menus.create') }}'" >新規作成</button>
                        <table>
                            <thead>
                                <tr>
                                    <th>一覧画像</th>
                                    <th>商品名</th>
                                    <th>商品情報</th>
                                    <th>料金</th>
                                    <th>カテゴリー</th>
                                    <th>見出し</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr>
                                    @if (empty($menu->frontImage))
                                        <td class="group h-40 block bg-gray-100 rounded-lg overflow-hidden relative mb-2 lg:mb-3">
                                            <img src="{{ asset('storage/defaultImages/no-image.png') }}" alt="画像未設定" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" >
                                        </td>
                                    @else
                                        <td class="group h-40 block bg-gray-100 rounded-lg overflow-hidden relative mb-2 lg:mb-3">
                                            <img src="{{ asset('storage/menus/' . $menu->frontImage) }}" alt="{{ $menu->name . '画像' }}" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" >
                                        </td>
                                    @endif
                                    <td>{{$menu->name}}</td>
                                    <td>{{$menu->information}}</td>
                                    <td>{{$menu->price}}</td>
                                    <td>
                                        @foreach ($categories as $category)
                                            @if ($menu->category_id === $category->id)
                                                {{$category->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($headings as $heading)
                                            @if ($menu->heading_id === $heading->id)
                                                {{$heading->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td><button type="button" onclick="location.href='{{ route('admin.menus.edit', ['menu' => $menu->id]) }}'" >変更</button></td>
                                    <td>
                                        <form action="{{ route('admin.menus.destroy', ['menu' => $menu->id]) }}" method="post" >
                                            @method('delete')
                                            @csrf
                                            <button type="submit" >削除</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- メニュー一覧 -->
                    <!-- メインコンテンツ_終了 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
