<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Facades\Log;


use App\Models\Menu;
use App\Models\Category;
use App\Models\Prefecture;
use App\Models\Heading;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::all();
        $categories = Category::all();
        $headings = Heading::all();

        // dd($menu->prefectures);
        return view('admin.menus.index',
                compact('menus', 'categories', 'headings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $headings = Heading::all();
        $prefectures = Prefecture::all();
        return view('admin.menus.create',
                compact('categories', 'headings', 'prefectures'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'information' => ['required', 'string', 'max:500'],
            'price' => ['required', 'integer', 'max:10000',],
            'frontImage' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'category' => ['required', 'exists:categories,id'],
            'heading' => ['required', 'exists:headings,id'],
        ]);

        try{
            DB::transaction(function () use($request) {
                // 画像Storage登録
                $frontImagePaht = Storage::putFile('public/menus', $request->frontImage);

                // メニュー登録
                $menu = Menu::create([
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'frontImage' => basename($frontImagePaht),
                    'category_id' => $request->category,
                    'heading_id' => $request->heading,
                ]);

                // リレーション登録
                $menu->prefectures()->sync($request->prefecture_ids);
                
            });
        } catch(Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()->route('admin.menus.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $menu = Menu::findOrFail($id);
        $categories = Category::all();
        $headings = Heading::all();
        $prefectures = Prefecture::all();

        return view('admin.menus.edit',
                compact('menu', 'categories', 'headings', 'prefectures'));
    }

    public function update(Request $request, $id)
    {
        //
        // validate
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'information' => ['required', 'string', 'max:500'],
            'price' => ['required', 'integer', 'max:10000',],
            // 'frontImage' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'category' => ['required', 'exists:categories,id'],
            'heading' => ['required', 'exists:headings,id'],
        ]);

        try{

            DB::transaction(function () use($request, $id) { 
                // 画像Storage登録
                $frontImagePaht = Storage::putFile('public/menus', $request->frontImage);

                // Menuを取得
                $menu = Menu::findOrFail($id);

                // Menuを更新
                $menu->name = $request->name;
                $menu->information = $request->information;
                $menu->price = $request->price;
                $menu->frontImage = basename($frontImagePaht);
                $menu->category_id = $request->category;
                $menu->heading_id = $request->heading;
                $menu->save();

                // menu_prefectureを更新
                $menu->prefectures()->sync($request->prefecture_ids);

            });

        } catch(Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()->route('admin.menus.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Menu::findOrFail($id)->delete();
        return redirect()->route('admin.menus.index');
    }

    // Mold
    // $arr = [];
    // $str = str_replace(array("\r\n", "\r", "\n"), "\n", $request->information);
    // $arr = explode("\n", $str);
    // dd($arr);
}
