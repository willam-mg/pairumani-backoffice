<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospedajeFormRequest extends FormRequest
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
            'fecha_checkin' => 'required',
            'fecha_checkout' => 'required',
        ];

        if (routerequest('hospedajes_create')) {
            $rules['cliente_id'] = ['required', 'integer', 'unique:hospedajes'];
            $rules['habitacion_id'] = ['required', 'integer', 'unique:hospedajes'];
        }

        return $rules;
    }
}
