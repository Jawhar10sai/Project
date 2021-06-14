<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commandeRequest extends FormRequest
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
            'canal_appel'=>['required'],
            'type'=>['required'],
            'source'=>['required'],
            'code_client'=>['required'],
            'nom_client'=>['required','string'],
            'code_benificiaire'=>['required'],
            'nom_benificiaire'=>['required','string'],
            'agence_client' => ['required', 'string'],
            'secteur_client' => ['required', 'string'],
            'adresse_client' => ['required', 'string'],
           // 'a_poids_lourds' => ['required'],
            'num_colis' => ['required'],
            'nature_colis' => ['required'],
           // 'sysdate' => ['required'],
           // 'systime' => ['required'],    
        ];
    }
}
