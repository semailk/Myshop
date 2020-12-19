<?php

namespace App\Http\Requests\Shop\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'name' => 'required|unique:users|min:2|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:50'
        ];
    }
}