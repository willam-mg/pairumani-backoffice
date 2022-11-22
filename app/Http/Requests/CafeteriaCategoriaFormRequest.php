<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CafeteriaCategoriaFormRequest extends FormRequest
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
        ];

        if (routerequest('cafeteriacategorias_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:cafeteria_categorias'];
            $rules['foto'] = ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        if (routerequest('cafeteriacategorias_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
            $rules['foto'] = ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        return $rules;
    }
}
