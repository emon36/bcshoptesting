<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendor extends FormRequest
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
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users',
            'phone' => 'required|max:11|unique:users',
            'nid' => 'required|image|max:2048',
            'trade_licence' => 'nullable|image|max:2048',
            'owner_image' => 'required|image|max:2048',
            'shop_name' => 'required',
            'shop_url' => 'required|unique:vendors',
            'shop_phone' => 'required|max:11|unique:vendors',
            'shop_address' => 'required',
            'shop_city' => 'required',
            'shop_zip' => 'required',
            'shop_logo' => 'required|image|max:1024',
            'shop_banner' => 'required|image|max:2048',

        ];
    }
}
