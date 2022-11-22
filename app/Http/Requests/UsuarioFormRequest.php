<?php

namespace App\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'direccion' => 'required|max:255|string',
            'rol_id' => 'required|numeric',
        ];

        if (routerequest('usuarios_create')) {
            $rules['nombre'] = ['required', 'max:255', 'unique:users'];
            $rules['apellido'] = ['required', 'max:255', 'unique:users'];
            $rules['email'] = ['required', 'max:255', 'unique:users'];
            $rules['telefono'] = ['required', 'max:255', 'unique:users'];
            $rules['password'] = ['required','min:6'];
        }

        if (routerequest('usuarios_edit')) {
            $rules['nombre'] = ['required', 'max:255'];
            $rules['apellido'] = ['required', 'max:255'];
            $rules['email'] = ['required', 'max:255'];
            $rules['telefono'] = ['required', 'max:255'];
            $rules['password'] = [''];
        }

        return $rules;
    }
}
