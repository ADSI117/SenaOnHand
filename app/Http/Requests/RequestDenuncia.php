<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDenuncia extends FormRequest
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
            'user_id'=>'required', 
            'publicacion_id'=>'required', 
            'comentario_id', 
            'tipo_id'=>'required', 
            'estado_id'=>'required', 
            'comentario'=>'min:4|max:255|required'
        ];
    }
}
