<?php

namespace App\Http\Requests\Shop\ShopCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreShopCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'slug' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name не может быть пустым',
            'slug.required' => 'slug не может быть пустым'
        ];
    }
}
