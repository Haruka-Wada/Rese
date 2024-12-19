<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'area_id' => 'required',
            'genre_id' => 'required',
            'outline' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店舗名を入力してください',
            'area_id.required' => '地域を選択してください',
            'genre_id.required' => 'ジャンルを選択してください',
            'outline.required' => '詳細を入力してください',
            'image.required' => '店舗の画像を選択してください',
            'image.file' => 'ファイルを指定してください',
            'image.mimes' => 'jpeg,jpg,pngを指定してください'
        ];
    }
}
