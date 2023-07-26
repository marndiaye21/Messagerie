<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "firstname" => "sometimes|required",
            "lastname" => "sometimes|required",
            "phone" => "sometimes|required|unique:users|regex:/^(7[76508]{1})(\\d{7})$/"
        ];
    }

    public function messages(){
        return [
            "firstname.required" => "le prenom est requis !",
            "lastname.required" => "le nom est requis !",
            "phone.required" => "le numéro de téléphone est requis !",
            "phone.regex" => "le format du  numéro de téléphone est incorrecte !",
            "phone.unique" => "le numéro de téléphone doit être unique !",
        ];
    }
}
