<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class PeliculaRequest extends Request
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
            'titulo'   =>'min:8|max:250|required|unique:peliculas',
            'genero_id'=>'required',
            'resumen'  =>'min:10|required',
            'imagen'   =>'image|required',
        ];
    }
}
