<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|max:225',
            'email' => 'required|email||max:225',
            'password' => 'confirmed',
            'file_avatar' => 'mimes:jpeg,bmp,png,jpg,gif,svg,ico',
        ];
    }
}
