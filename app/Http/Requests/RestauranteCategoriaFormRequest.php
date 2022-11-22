<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestauranteCategoriaFormRequest extends FormRequest
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

        if (routerequest('restaurantecategorias_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:restaurante_categorias'];
            $rules['foto'] = ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        if (routerequest('restaurantecategorias_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
            $rules['foto'] = ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        return $rules;
    }
}
