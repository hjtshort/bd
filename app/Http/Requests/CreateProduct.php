<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
            'product_title'=>'required',
            'city_id'=>'required',
            'district_id'=>'required',
            'type_id'=>'required',
            'property_id'=>'required',
            'product_info'=>'required',
            'product_acreage'=>'required',
            'product_price'=>'required|min:0',
            'product_address'=>'required',
            'product_fast'=>'required',
            'direction_id'=>'required',

        ];
    }
}
