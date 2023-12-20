<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class GuardarRestauranteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'direccion' => ['required', 'string'],
            'id_poblacion' => ['required', 'integer'],
            'telefono' => ['required', 'string'],
            'horario' => ['required', 'string'],
            'gluten' => ['required', 'boolean'],
            'vegano' => ['required', 'boolean'],
            'web' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:jpg'],
        ];
    }


    public function attributes() 
    {
        return [
            'titulo' => 'título',
            'descripcion' => 'descripción',
            'direccion' => 'dirección',
            'id_poblacion' => 'población',
            'telefono' => 'teléfono',
            'file' => 'imagen',
        ];
    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
                if (!is_null($this->file('file')) && !$this->file('file')->isValid()) {
                    $validator->errors()->add(
                        'file',
                        $this->file('file')->getErrorMessage()
                    );
                }
            }
        ];
    }
}
