<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
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
        $id = $this->segment(2);

        return [
            'nome' => "required|min:3|max:255|unique:produtos,nome,{$id},id",
            'descricao' => "required|min:3|max:10000",
            'preco' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'photo' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'preco.required' => 'Preço é requerido!',
            'nome.required' => 'Nome é obrigatório!',
            'descricao.required' => 'Descrição é obrigatório!',
            'name.min' => 'Ops! Precisa informar pelo menos 3 caracteres!',
            'photo.required' => 'Ops! Precisa informar uma imagem!',
        ];
    }
}
