<?php

namespace App\Http\Requests\Shop\ShopProduct;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreShopProductRequest extends FormRequest
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
            'title' => 'required|min:5|max:250',
            'description' => 'nullable|min:5|max:1000',
            'category_id' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" не может быть пустым',
        ];
    }
}
