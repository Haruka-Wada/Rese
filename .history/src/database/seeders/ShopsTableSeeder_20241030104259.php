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
                [
                    'area_id' => '1',
                    'genre_id' => '1',
                    'name' => '仙人',
                    'outline' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
                    'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'
                ],
            [
                'area_id' => '2',
                'genre_id' => '',
                'name' => '牛助',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '1',
                'genre_id' => '1',
                'name' => 'らーめん極み',
                'outline' => '一杯、一杯心を込めて職人が作っております。味付けは少し濃いめです。 食べやすく最後の一滴まで美味しく飲めると好評です。',
                'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg'],
            [
                'area_id' => '2',
                'genre_id' => '3',
                'name' => '鳥雨',
                'outline' => '素材の旨味を存分に引き出す為に、塩焼を中心としたお店です。比内地鶏を中心に、厳選素材を職人が備長炭で豪快に焼き上げます。清潔な内装に包まれた大人の隠れ家で贅沢で優雅な時間をお過ごし下さい。',
                'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg'
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
            [
                'area_id' => '',
                'genre_id' => '',
                'name' => '',
                'outline' => '',
                'img' => ''
            ],
        ]);
    }
}