<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('prefectures')->insert([
            [
                'name' => '北海道',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => '青森県',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => '岩手県',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => '宮城県',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
