<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AdministratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            [
                'name' => 'hoge01',
                'use_id' => 'admin001',
                'password' => 'pass'
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
