<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUpdateCategorias extends FormRequest
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
        
        $id = $this->segment(3);
        return [
            'nome' => "required|min:3|max:40|unique:categorias,nome,{$id},id",
            'url' => "required|min:3|max:60|unique:categorias,url,{$id},id",
            'descricao' => 'max:2000',
        ];
    }
}
