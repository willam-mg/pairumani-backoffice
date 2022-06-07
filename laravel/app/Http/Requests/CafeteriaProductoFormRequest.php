<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CafeteriaProductoFormRequest extends FormRequest
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
        ];

        if (routerequest('cafeteria_productos_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:cafeteria_productos'];
            $rules['foto'] = ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
            // $rules['restaurante_categoria_id'] = ['required','integer'];
        }

        if (routerequest('cafeteria_productos_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
            $rules['foto'] = ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
            // $rules['restaurante_categoria_id'] = ['integer'];
        }

        return $rules;
    }
}
