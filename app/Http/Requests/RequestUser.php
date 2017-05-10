<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            
            'email' =>'min:4|max:45|required|unique:users|email', 
            'password' =>'min:4|max:45|required',
            'rol_id' =>'required',
            'estado_id' =>'required',
            'num_doc'=>'max:15',
            'nombres'=>'max:45',
            'apellidos'=>'max:45',
            'fecha_nac'=>'max:45',
            'profesion'=>'max:45',
            'url_foto'=>'max:100'
        ];
    }
}
