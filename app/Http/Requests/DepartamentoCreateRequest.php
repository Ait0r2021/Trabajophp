<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoCreateRequest extends FormRequest
{
    function attributes() {
        return [
            'nombre'        => 'Nombre del departamento',
            'localizacion'  => 'Localización del departamento',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    function messages() {
        $max        = 'El campo :atribute no puede tener más de :max carácteres';
        $min        = 'El campo :attribute no puede tener menos de :min caracteres';
        $numeric    = 'El campo :attribute debe ser numérico';
        $required   = 'El campo :attribute es obligatorio';
        $unique     = 'El campo :attribute debe ser único en la tabla de localización';

        return [
            'nombre.max'         => $max,
            'nombre.min'         => $min,
            'nombre.required'    => $required,
            'nombre.unique'      => $unique,
            
            'localizacion.max'      => $max,
            'localizacion.min'      => $min,
            'localizacion.required' => $required,
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'        => 'required|min:5|max:100|',
            'localizacion'  => 'required|min:5|max:100|',
        ];
    }
}