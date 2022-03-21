<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert([
            [
                'name' => 'メニュー１',
                'information' => '説明文',
                'price' => 300,
                'category_id' => 1,
                'heading_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'メニュー２',
                'information' => '説明文',
                'price' => 400,
                'category_id' => 2,
                'heading_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'メニュー３',
                'information' => '説明文',
                'price' => 500,
                'category_id' => 3,
                'heading_id' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'メニュー４',
                'information' => '説明文',
                'price' => 500,
                'category_id' => 3,
                'heading_id' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'メニュー５',
                'information' => '説明文',
                'price' => 500,
                'category_id' => 3,
                'heading_id' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'メニュー６',
                'information' => '説明文',
                'price' => 500,
                'category_id' => 3,
                'heading_id' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'メニュー７',
                'information' => '説明文',
                'price' => 500,
                'category_id' => 3,
                'heading_id' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'メニュー８',
                'information' => '説明文',
                'price' => 500,
                'category_id' => 3,
                'heading_id' => 3,
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
