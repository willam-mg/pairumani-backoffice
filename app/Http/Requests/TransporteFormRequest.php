<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransporteFormRequest extends FormRequest
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

        if (routerequest('transportes_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:transportes'];
        }

        if (routerequest('transportes_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
        }

        return $rules;
    }
}
