<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class produtoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'nome' => 'required|min:3',
            'preco' => 'required|decimal:0|min:0.01' ,
            'descricao' => 'nullable|max:500',
            'categoria' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'nome.required' => 'Por favor, preencha o campo nome do produto.',
            'nome.min' => 'O campo nome tem que ter no min 3 caracteres.',
            'preco.required' => 'Por favor, preencha o campo preço.',
            'preco.min' => 'Por favor, atribua o valor de no minímo R$ 0.01',
            'descricao.max' => 'O campo descricao, só pode ter no máximo 500 caracteres.',
            'categoria.exists' => 'Por favor, preencha o campo categoria.'
        ];
    }
}
