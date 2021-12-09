<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class EmpleadoCreateRequest extends FormRequest
{
    function attributes() {
        return [
            'nombre'        => 'nombre del empleado',
            'apellidos'  => 'apellidos del empleado',
            'telefono'  => 'numero de teléfono del empleado',
            'email'  => 'email del empleado',
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
        $unique     = 'El campo :attribute debe ser único en la tabla de empleados';
        $integer    = 'El campo :attribute debe ser un númeri entero';
        $gte        = 'El campo :attribute tiene que ser superior a :value';
        $lte        = 'El campo :attribute tiene que ser inferior a :value';

        return [
            'nombre.max'         => $max,
            'nombre.min'         => $min,
            'nombre.required'    => $required,
            
            'apellidos.max'      => $max,
            'apellidos.min'      => $min,
            'localizacion.required' => $required,
            
            'telefono.unique'   => $unique,
            'telefono.required' => $required,
            'telefono.integer'  => $integer,
            'telefono.gte'      => $gte, 
            'telefono.lte'      => $lte,
            
            'email.required'    => $required,
            'email.unique'      => $unique,
            'email.min'         => $min,
            'email.max'         => $max,
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
            'nombre'    => 'required|min:5|max:100|',
            'apellidos' => 'required|min:5|max:100|',
            'telefono'  => 'required|unique:empleados|integer|gte:111111111|lte:999999999',
            'email'     => 'required|unique:empleados|min:20|max:50'
        ];
    }
}