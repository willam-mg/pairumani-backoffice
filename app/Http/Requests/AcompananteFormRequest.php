<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcompananteFormRequest extends FormRequest
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
            'tipo_documento' => 'required|in:Ci,Dni,Pasaporte',
            'num_documento' => 'required|string',
            'nacionalidad' => 'required|max:50',
            'fecha_nacimiento' => 'required',
            'ciudad' => 'required|max:50',
        ];

        if (routerequest('acompanantes_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:acompanantes'];
        }

        if (routerequest('acompanantes_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
        }

        return $rules;
    }
}
