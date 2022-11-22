<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromocionFormRequest extends FormRequest
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
            'estado' => 'required|in:Activo,Inactivo',
        ];
        
        if (routerequest('promociones_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:promociones'];
            $rules['foto'] = ['required','mimes:jpeg,png,jpg,gif,svg','max:2048'];
        }

        if (routerequest('promociones_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
            $rules['foto'] = ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        return $rules;
    }
}
