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
            'type'=>'requred|integer|between:1,2',
            'description'=>'string',
            'user_id'=>'required|exist:users',
            'category_id'=>'required|exist:categories',
            'city_id'=>'required|exist:cities',
            'phone'=>'required',
            'email'=>'email',
            'web_page'=>'url',
            'status_id'=>'required|exist:advert_status'
        ];
    }

}
