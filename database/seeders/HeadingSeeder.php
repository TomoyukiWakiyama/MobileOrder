<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('headings')->insert([
            [
                'name' => 'ピックアップメニュー',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'レギュラーメニュー(一皿)',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'レギュラーメニュー(二皿)',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'プラスから揚げ',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'プラスサラダ',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
