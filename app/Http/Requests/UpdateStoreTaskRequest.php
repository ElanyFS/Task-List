<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => [
                'string',
                Rule::requiredIf($this->method() === 'post')
            ],
            'status' => [
                'string',
                Rule::requiredIf($this->method() === 'put'),
                Rule::in(['aberto', 'pendente', 'concluida'])
            ]
        ];
    }
}
