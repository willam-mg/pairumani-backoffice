<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacionFormRequest extends FormRequest
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
        $rules = [
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'precio_promocion' => 'required|numeric',
            'capacidad_minima' => 'required|integer',
            'capacidad_maxima' => 'required|integer',
            'estado' => 'required|in:Disponible,Ocupado,Reservado,Limpieza',
        ];

        if (routerequest('habitaciones_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:habitaciones'];
            $rules['num_habitacion'] = ['required','integer', 'unique:habitaciones'];
            $rules['foto'] = ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        if (routerequest('habitaciones_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
            $rules['num_habitacion'] = ['required'];
            $rules['foto'] = ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        return $rules;
    }
}
