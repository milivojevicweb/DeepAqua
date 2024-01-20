<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class insertInGalleryRequest extends FormRequest
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
            "image" => "required|mimes:jpg,jpeg,gif,png|max:3000",
        ];
    }

    public function messages()
    {
        return [
            "required" => "Field :attribute error."
        ];
    }
}
