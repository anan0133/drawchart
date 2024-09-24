<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChartRequest extends FormRequest
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
            'title' => 'required|max:256',
            'file_thumbnail' => 'nullable|mimes:jpeg,bmp,png,jpg,gif,svg,ico'
        ];
        return $rules;
    }
}
