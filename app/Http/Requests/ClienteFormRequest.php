<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'tipo_documento' => 'required|in:Ci,Pasaporte',
            'direccion' => 'required|max:200',
            'ciudad' => 'required|max:50',
            'pais' => 'required|max:50',
            'oficio' => 'required|max:50',
            'empresa' => 'required|max:50',
            'fecha_nacimiento' => 'required',
            'motivo_viaje' => 'required|in:Recreacion,Negocios,Salud,Otro',
            'password' => 'max:50|unique:clientes',
        ];

        if (routerequest('clientes_create')) {
            $rules['nombres'] = ['required', 'unique:clientes'];
            $rules['apellidos'] = ['required', 'unique:clientes'];
            $rules['num_documento'] = ['required', 'unique:clientes'];
            $rules['celular'] = ['required', 'unique:clientes'];
            $rules['telefono'] = ['required', 'unique:clientes'];
            $rules['email'] = ['required', 'unique:clientes'];
            // $rules['password'] = ['required', 'unique:clientes'];
        }

        if (routerequest('clientes_edit')) {
            $rules['nombres'] = ['required'];
            $rules['apellidos'] = ['required'];
            $rules['num_documento'] = ['required'];
            $rules['celular'] = ['required'];
            $rules['telefono'] = ['required'];
            $rules['email'] = ['required'];
            // $rules['password'] = ['required'];
        }

        return $rules;
    }
}
