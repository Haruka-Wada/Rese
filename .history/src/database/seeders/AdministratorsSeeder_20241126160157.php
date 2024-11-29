<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrate')->insert([
            [
                'name' => '東京都',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => '大阪府',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => '福岡県',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        ]);
    }
}
