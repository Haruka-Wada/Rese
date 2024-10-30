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
            ['name' => '寿司',
            'area_id' ],
            ['name' => '焼肉'],
            ['name' => '居酒屋'],
            ['name' => 'イタリアン'],
            ['name' => 'ラーメン']
        ]);
    }
}