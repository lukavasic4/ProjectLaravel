<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "logEmail" => "regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",
            "logPassword" => "regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/"
        ];
    }
}
