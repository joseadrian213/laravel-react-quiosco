<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//Para poder utilizar el request se debe de colocar el true 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        "name"=> ["required","string"],
        "email"=>["required","email","unique:users,email"],
        "password"=>[
            "required",
            "confirmed",
            PasswordRules::min(8)->letters()->symbols()->numbers()
        ]
        ];

    }
    //Mensajes de error para la validacion como respuestas 
    public function messages(){
        //Con el punto iindicamos cual es la validacion en la que queremos enviar como respuesta cierto mensaje 
        return[
            "name"=>"EL nombre es obligatorio",
            "email.required"=>"El email es obligatorio",
            "email.email"=>"El email no es valido",
            "email.unique"=>"El email ya esta registrado",
            "password"=>"El password debe contener al menos 8 caracteres, un símbolo y un numero"
        ];
    }


}
