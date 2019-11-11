<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertRequest extends FormRequest
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
            'title'=>'required|min:2|',
            'type'=>'required|integer|between:1,2',
            'description'=>'string',
            'category_id'=>'required|exists:categories,id',
            'city_id'=>'required|exists:cities,id',
            'phone'=>'required',
            'email'=>'email',
            'web_page'=>'url',
            'img.*'=>'file|mimes:jpg,jpeg,bmp,png'
        ];
    }

}
