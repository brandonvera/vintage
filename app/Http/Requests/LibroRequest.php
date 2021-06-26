<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
            'codigo'      => 'required',
            'nombre'      => 'required|max:32',
            //'categoria'   => 'required|max:32',
            'isbn'        => 'required|min:10|max:13',
            'cantidad'    => 'required',
            'precio'      => 'required',
            'imagen'      => 'required|mimes:jpeg,png,jpg'
        ];
    }
}
