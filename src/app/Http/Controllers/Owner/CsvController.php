<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CsvController extends Controller
{
    public function import(Request $request) {
        if($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            if ($file->getClientOriginalExtension() !== "csv") {
                return redirect('/owner')->with('message', '不適切な拡張子です。');
            }
            $path = $file->getRealPath();
            $fp = fopen($path, 'r');
            fgetcsv($fp);
            ;
            while (($csv_data = fgetcsv($fp)) !== FALSE) {
                $validator = Validator::make(
                    [
                        "店舗名" => $csv_data[0],
                        "地域" => $csv_data[1],
                        "ジャンル" => $csv_data[2],
                        "店舗概要" => $csv_data[3],
                        "画像" => $csv_data[4]
                    ],
                    [
                        '店舗名' => 'required|max:50',
                        '地域' => 'required',
                        'ジャンル' => 'required',
                        '店舗概要' => 'required|max:400',
                        '画像' => 'required'
                    ]
                );
                if ($validator->fails()) {
                    return redirect('/owner')
                        ->withErrors($validator)
                        ->withInput();
                }
                $this->InsertCsvData($csv_data);
            }
            fclose($fp);
            return redirect('owner');
        } else {
            return redirect('/owner')->with('message', 'CSVファイルの取得に失敗しました');
        }
    }

    public function InsertCsvData($csv_data) {
        $area_id = Shop::getAreaId($csv_data[1]);
        if(!$area_id) {
            return redirect('/owner')->with('message', '地域は、「東京都」「大阪府」「福岡県」で登録してください。');
        }
        $genre_id = Shop::getGenreId($csv_data[2]);
        if(!$genre_id) {
            return redirect('/owner')->with('message', 'ジャンルは「寿司」「焼肉」「居酒屋」「イタリアン」「ラーメン」で登録してください。');
        }
        $extension = pathinfo($csv_data[4], PATHINFO_EXTENSION);
        if($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
            $image = $csv_data[4];
        }else {
            redirect('/owner')->with('message', '画像URLは「jpg」「jpeg」「png」のファイル形式で登録してください。');
        }

        Shop::create([
            'name' => $csv_data[0],
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'outline' => $csv_data[3],
            'owner_id' => Auth::guard('owners')->id(),
            'image' => $image
        ]);

        return redirect('/owner')->with('message', 'CSVファイルをインポートしました。');

    }
}
