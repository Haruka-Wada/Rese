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
            ['area_id' => '1',
            'genre_id' => '1',
            'name' => 'らーめん極み',
            'outline' => '一杯、一杯心を込めて職人が作っております。味付けは少し濃いめです。 食べやすく最後の一滴まで美味しく飲めると好評です。',
            'img' => ''],
            ['name' => '焼肉'],
            ['name' => '居酒屋'],
            ['name' => 'イタリアン'],
            ['name' => 'ラーメン']
        ]);
    }
}