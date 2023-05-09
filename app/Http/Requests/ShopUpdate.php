<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopUpdate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'shop_name' => 'required',
            'shop_url' => 'required|unique:vendors,shop_url,'.$this->id,
            'shop_phone' => 'required|max:11|unique:vendors,shop_phone,'.$this->id,
            'shop_address' => 'required',
            'shop_city' => 'required',
            'shop_zip' => 'required',
            'shop_logo' => 'nullable|image|max:1024',
            'shop_banner' => 'nullable|image|max:2048',
            'shop_facebook' => 'nullable|url',
            'shop_instagram' => 'nullable|url',
            'shop_youtube' => 'nullable|url',
        ];
    }
}
