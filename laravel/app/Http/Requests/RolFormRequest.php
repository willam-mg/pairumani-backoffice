<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolFormRequest extends FormRequest
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
            'descripcion' => 'max:255'
        ];

        if (routerequest('roles_create')) {
            $rules['nombre'] = ['required', 'max:50', 'unique:roles'];
        }

        if (routerequest('roles_edit')) {
            $rules['nombre'] = ['required', 'max:50'];
        }

        return $rules;
    }
}
