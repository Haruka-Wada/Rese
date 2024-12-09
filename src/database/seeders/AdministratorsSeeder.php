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
                'email' => 'admin001@example.com',
                'password' => Hash::make('pass0001'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => 'hoge02',
                'email' => 'admin002@example.com',
                'password' => Hash::make('pass0002'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'name' => 'hoge03',
                'email' => 'admin003@example.com',
                'password' => Hash::make('pass0003'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
        ]);
    }
}
