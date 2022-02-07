<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUpdateProdutos extends FormRequest
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
        
        $id = $this->segment(4);
        return [
            'nome'      => "required|min:3|max:40|unique:produtos,nome,{$id},id",
            'preco'     => "required|min:1|max:10|unique:produtos,preco,{$id},id",
            'descricao' => 'max:2000',
            'categorias_id' => 'required|exists:categorias,id',
        ];
    }
}
