<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestComentario extends FormRequest
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
            'publicacion_id' =>'required', 
            'user_id' =>'required', 
            'estado_id' =>'required', 
            'comentario'=>'min:1|max:255|required'
        ];
    }
}
