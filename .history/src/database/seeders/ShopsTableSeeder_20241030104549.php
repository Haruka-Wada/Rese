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
                'genre_id' => '2',
                'name' => '牛助',
                'outline' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
                'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'
            ],
            [
                'area_id' => '3',
                'genre_id' => '3',
                'name' => '戦慄',
                'outline' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
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
                'area_id' => '1',
                'genre_id' => '4',
                'name' => 'ルーク',
                'outline' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
                'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg'
            ],
            [
                'area_id' => '3',
                'genre_id' => '5',
                'name' => '志摩屋',
                'outline' => 'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
                'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg'
            ],
            [
                'area_id' => '香',
                'genre_id' => '1',
                'name' => '2',
                'outline' => '大小さまざまなお部屋をご用意してます。デートや接待、記念日や誕生日など特別な日にご利用ください。皆様のご来店をお待ちしております。',
                'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'
            ],
            [
                'area_id' => '2',
                'genre_id' => '4',
                'name' => 'JJ',
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