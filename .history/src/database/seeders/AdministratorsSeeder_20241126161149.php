<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Administrator::truncate();

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
                'password' => Hash::make('pass0002'),
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
