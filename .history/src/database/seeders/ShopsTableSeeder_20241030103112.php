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
            ''],
            ['name' => '焼肉'],
            ['name' => '居酒屋'],
            ['name' => 'イタリアン'],
            ['name' => 'ラーメン']
        ]);
    }
}