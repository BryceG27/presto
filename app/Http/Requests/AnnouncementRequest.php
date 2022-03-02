<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
         'title'=> 'required|string|max:120',
         'body'=> 'required|string|max:500'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=> 'Devi inserire un titolo',
            'title.max'=> 'Il titolo deve avere massimo 120 caratteri',
            'body.max'=>'la descrizione deve avere massimo 500 caratteri',
            'body.requires'=>'Inserisci la descrizione'

        ];
        
    }
}
