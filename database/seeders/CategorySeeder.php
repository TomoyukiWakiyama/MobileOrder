<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'name' => 'お弁当',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'おかずのみ',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'サイドメニュー',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'イベント用',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
