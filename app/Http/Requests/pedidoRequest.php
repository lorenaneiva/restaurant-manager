<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // se estiver false, sempre dá 403
    }

    public function rules(): array{
        return [
            'nome_cliente' => 'required|max:30',
            'idMesa' => 'required|exists:mesas,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nome_cliente.required' => 'Por favor, preencha o campo nome do cliente.',
            'nome_cliente.max' => 'O campo nome pode ter no máximo 30 caracteres.',
            'idMesa.required' => 'Por favor, preencha o campo mesa.',
            'idMesa.exists' => 'A mesa escolhida não existe no sistema.'
        ];
    }
}
