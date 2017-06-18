<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPublicacion extends FormRequest
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
            'subcategoria_id'=>'required', 
            'estado_id'=>'required', 
            'titulo'=>'min:4|max:45|required', 
            'contenido'=>'max:255', 
            'url_video'=>'max:255', 
            'url_archivo'=>'max:255|mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf'
        ];
    }
}
