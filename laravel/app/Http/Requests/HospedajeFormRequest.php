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
        return [
            'fecha_checkin' => 'required',
            'fecha_checkout' => 'required',
            'niños' => 'required|numeric',
            'adultos' => 'required|numeric',
            'cliente_id' => 'required|integer',
            'habitacion_id' => 'required|integer'
        ];
    }
}
