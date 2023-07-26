<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed|same:password_confirmation",
            "phone" => "required|unique:users|regex:/^(7[76508]{1})(\\d{7})$/"
        ];
    }

    public function messages(){
        return [
            "firstname.required" => "le prenom est requis !",
            "lastname.required" => "le nom est requis !",
            "email.required" => "l'email est requis !",
            "email.email" => "l'addresse email est incorrect !",
            "email.unique" => "l'email existe déjà !",
            "password.required" => "le mot de passe est requis !",
            "password.min" => "le mot de passe doit contenir au moins 6 caractères!",
            "password.same" => "les mots de passe ne correspondent pas !",
            "phone.required" => "le numéro de téléphone est requis !",
            "phone.regex" => "le format du  numéro de téléphone est incorrecte !",
            "phone.unique" => "le numéro de téléphone doit être unique !",
        ];
    }
}
