<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class EmpleadoCreateRequest extends FormRequest
{
    function attributes() {
        return [
            'nombre'    => 'Nombre del departamento',
            'minimo'    => 'Salario mínimo',
            'maximo'    => 'Salario máximo',
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
            'nombre.max'        => $max,
            'nombre.min'        => $min,
            'nombre.required'   => $required,
            
            'minimo.gte'        => $gte,
            'minimo.lte'        => $lte,
            'minimo.numeric'    => $numeric,
            'minimo.required'   => $required,
            
            'maximo.gte'        => $gte,
            'maximo.lte'        => $lte,
            'maximo.numeric'    => $numeric,
            'minimo.required'   => $required,
            

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
            'minimo'    => 'required|numeric|gte:0.01|lte:999999999.99',
            'maximo'    => 'required|numeric|gte:0.01|lte:999999999.99',
        ];
    }
}