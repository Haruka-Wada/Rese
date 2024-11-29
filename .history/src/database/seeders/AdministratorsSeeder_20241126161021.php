<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illu
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
                'user_id' => 'admin001',
                'password' => Hash::make('pass0001'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => 'hoge02',
                'user_id' => 'admin002',
                'password' => 'pass0002',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => 'hoge03',
                'user_id' => 'admin003',
                'password' => 'pass0003',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
        ]);
    }
}
