<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuPrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<5;$i++){
            DB::table('menu_prefecture')->insert([
                
                [
                    'menu_id' => 1,
                    'prefecture_id' => $i,
                ],
                [
                    'menu_id' => 2,
                    'prefecture_id' => $i,
                ],
                [
                    'menu_id' => 3,
                    'prefecture_id' => $i,
                ],
                [
                    'menu_id' => 4,
                    'prefecture_id' => $i,
                ],
                [
                    'menu_id' => 5,
                    'prefecture_id' => $i,
                ],
                [
                    'menu_id' => 6,
                    'prefecture_id' => $i,
                ],
                [
                    'menu_id' => 7,
                    'prefecture_id' => $i,
                ],
                [
                    'menu_id' => 8,
                    'prefecture_id' => $i,
                ],
            ]);
        }
    }
}
