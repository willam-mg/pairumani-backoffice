<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LugarTuristicoFormRequest extends FormRequest
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
            'lat' => 'required|string',
            'lng' => 'required|string',
            'precio_recorrido' => 'required|numeric',
            'tipo' => 'required|in:Turismo,Gastronomia',
        ];

        if (routerequest('lugaresturisticos_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:lugares_turisticos'];
            $rules['foto'] = ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        if (routerequest('lugaresturisticos_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
            $rules['foto'] = ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        return $rules;
    }
}
