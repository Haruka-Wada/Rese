<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => 'tony',
      'age' => 35,
      'nationality' => 'American'
    ];
    DB::table('authors')->insert($param);
    }
}
