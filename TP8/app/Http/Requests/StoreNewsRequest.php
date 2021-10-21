<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'message' => ['required'],
            'date' => ['required', 'date']
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Il faut spécifier un titre',
            'title.max' => 'Le titre ne doit pas contrenir plus de 100 caractères',
            'message.required' => 'Il faut spécifier un message',
            'date.required' => 'Il faut spécifier un date',
            'date.date' => 'Le format de la date est incorrect'
        ];
    }

    public function attributes()
    {
        return [
                'title' => 'titre',
                'message' => 'message',
                'date' => 'date'
            ];
    }
}
