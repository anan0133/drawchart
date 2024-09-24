<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
        $rules = [
            //
            'name_en' => 'required|max:255',
            'name_vi' => 'required|max:255',
            'key' => 'required|max:255',
            'file_thumbnail' => 'nullable|mimes:jpeg,bmp,png,jpg,gif,svg,ico'
        ];
        return $rules;
    }
}
