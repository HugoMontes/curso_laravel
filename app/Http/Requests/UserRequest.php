<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        // Cambiar a true para permitir el uso de validacion
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
       // Adicionar las reglas de validacion
        return [
            'name'=>'min:4|max:100|required',
            // users es nombre de la tabla
            'email'=>'min:4|max:100|required|unique:users|email',
            'password'=>'min:4|max:100|required'
        ];
    }
}
