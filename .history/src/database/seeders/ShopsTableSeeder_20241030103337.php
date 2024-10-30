<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'area_id' => '1',
                'genre_id' => '1',
                'name' => 'らーめん極み',
                'outline' => '一杯、一杯心を込めて職人が作っております。味付けは少し濃いめです。 食べやすく最後の一滴まで美味しく飲めると好評です。',
                'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg'],
            [
                'area_id' => '2',
                'genre_id' => '2',
                'name' => '鳥雨',
                'outline' => '',
                'img' => ''
            ],
        ]);
    }
}