<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAnuncio extends FormRequest
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
            'tipo_id' =>'required', 
            'user_id'=>'required', 
            'titulo'=>'min:4|max:45|required', 
            'contenido'=>'min:4|max:255|required', 
            'url_imagen' =>'max:255', 
            'fecha'=>'max:45', 
            'lugar'=>'max:45', 
            'telefono'=>'max:15', 
            'email' =>'min:4|max:45|required|unique:users|email'
        ];
    }
}
