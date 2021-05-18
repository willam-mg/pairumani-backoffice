<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromocionReservaFormRequest extends FormRequest
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
            'cliente_id' => 'required|integer',
            'checkin' => 'required',
            'checkout' => 'required',
            'adultos' => 'required|integer',
            'niños' => 'required|integer',
            'cliente_id' => 'required|integer',
        ];
    }
}
