<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientRequest extends FormRequest
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
       //     'code_client'=>['required','string'],
            'nom_client'=>['required','string'],
            'agence_client'=>['required','string'],
            'secteur_client'=>['required','string'],
            'num_tel_client'=>['required','string'],
       //     'commercial_client' => ['required', 'string'],
            'adresse_client'=>['required','string'],
        ];
    }
}
