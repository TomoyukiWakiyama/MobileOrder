<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Prefecture;
use App\Models\Heading;

class Itemcontroller extends Controller
{
    //
    public function index(Request $request)
    {
        // もしprefectureパラメータからidを取得する
        $prefecture_id = $request->prefecture;
        if(!$prefecture_id){
            $prefecture_id = 1;
        }
        $pagination_id = $request->pagination;
        if(!$pagination_id){
            $pagination_id = 2;
        }
        

        // タグidで絞り込みを行う
        $menus = Menu::leftJoin('menu_prefecture', 'menu_prefecture.menu_id', '=', 'menus.id')
                ->where('menu_prefecture.prefecture_id', '=', $prefecture_id)
                ->paginate($pagination_id);
        
        $categories = Category::get();
        $headings = Heading::get();
        $prefectures = Prefecture::get();

        
        

        // dd($menu->prefectures);
        return view('user.items.index',
                compact('menus', 'categories', 'headings', 'prefectures'));
    }
}
