<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CambiarDatosRequest extends FormRequest
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
        $id = Auth::id();
        return [
            'name' => ['required', 'string', Rule::unique('usuarios')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('usuarios')->ignore($id)],
         
        ];
    }


    public function attributes() 
    {
        return [
            'name' => 'nombre de usuario',
            'email' => 'correo electrónico',
          
        ];
    }
}
