@if (empty($menu->frontImage))
    <td>画像なし</td>
@else
    <td><img src="{{ asset('storage/menus/' . $menu->frontImage) }}" alt=""></td>
@endif