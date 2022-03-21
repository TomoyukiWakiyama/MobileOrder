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
                    {{-- <div> <!-- 都道府県絞り込み -->
                        <ul>
                        @foreach ($prefectures as $prefecture)
                            <li><a href="/?prefecture={{$prefecture->id}}">{{$prefecture->name}}</a></li>
                        @endforeach
                        </ul>
                    </div> --}}

                    <div> <!-- 都道府県絞り込み_form -->

                        <form action="{{ route('user.items.index') }}" method="get">
                            <div><!-- 都道府県 -->
                                都道府県
                                <select name="prefecture" id="prefecture">
                                    @foreach ($prefectures as $prefecture)
                                        <option value="{{$prefecture->id}}" @if( (int) \Request::get('prefecture') === $prefecture->id){ selected } @endif > {{$prefecture->name}} </option>
                                    @endforeach
                                </select>
                            </div><!-- 都道府県 -->
                            <div><!-- 表示件数 -->
                                表示件数
                                <select name="pagination" id="pagination">
                                    <option value="2" @if( (int) \Request::get('pagination') === 5){ selected } @endif >2件</option>
                                    <option value="10" @if( (int) \Request::get('pagination') === 10){ selected } @endif >10件</option>
                                    <option value="20" @if( (int) \Request::get('pagination') === 20){ selected } @endif >20件</option>
                                </select>
                                
                            </div><!-- 表示件数 -->
                        </form>
                    </div>

                    <div> <!-- メニュー一覧 -->
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $menus->appends([
                            'prefecture' => \Request::get('prefecture'),
                            'pagination' => \Request::get('pagination'),
                        ])->links() }}
                    </div> <!-- メニュー一覧 -->
                    <!-- メインコンテンツ_終了 -->
                </div>
            </div>
        </div>
    </div>
    <script>
        const select = document.getElementById('prefecture')
        select.addEventListener('change', function(){
            this.form.submit()
        })
        const paginate = document.getElementById('pagination')
        paginate.addEventListener('change', function(){
            this.form.submit()
        })
    </script>
</x-app-layout>
