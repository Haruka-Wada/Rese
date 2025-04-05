<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'rating' => 'required',
            'comment' => 'required|string|max:400',
            'image' => 'required|file|mimes:jpeg,png|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => '評価は必ず入力してください',
            'comment.required' => 'コメントは必ず入力してください',
            'comment.string' => 'コメントは文字列で入力してください',
            'comment.max' => '文字数は400文字以内で入力してください',
            'image.required' => '画像を選択してください',
            'image.file' => 'ファイルを指定してください',
            'image.mimes' => 'jpeg,pngを指定してください',
            'image.dimensions' => '画像サイズが無効です'
        ];
    }
}
