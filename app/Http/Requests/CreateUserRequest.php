<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users,users.email',
            'password'=>'required|min:5|confirmed|regex:/^[a-zA-Z0-9!$#%]+$/',
            'password_confirmation'=>'required',
            'address'=>'required',
            'sex'=>'required',
            'phone'=>'required|regex:/(0)[0-9]{9}+$/',
            'image'=>'required|mimes:jpeg,jpg,png,bmp',
        ];
    }
}
