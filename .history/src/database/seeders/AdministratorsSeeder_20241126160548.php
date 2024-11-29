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
                'password' => 'pass0001',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => 'hoge02',
                'use_id' => 'admin002',
                'password' => 'pass0002',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => 'hoge0',
                'use_id' => 'admin001',
                'password' => 'pass0001',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
        ]);
    }
}
