<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            "email" => "required|email",
            "name" => [ "required", "regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14})*$/" ],
            "lastName" => [ "required", "regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14})*$/" ],
            "password" => [ "required", "regex:/^(?=.*\d)(?=.*[A-zČĆŽŠĐčćžšđ])(?=.*[~!@#$%^&*<>?]).{6,}$/" ],
            "repeatPassword" => [ "required", "regex:/^(?=.*\d)(?=.*[A-zČĆŽŠĐčćžšđ])(?=.*[~!@#$%^&*<>?]).{6,}$/" ],
            "key" => "required"
        ];
    }

    public function messages(){
        return [
            "required" => "Field :attribute error."
        ];
    }
}
