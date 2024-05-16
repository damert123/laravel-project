<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'pass' => 'required|min:6',
            'email' => 'required|email|'
        ];

        
    }

    public function messages(){
        return[
            'name.required' => 'Заполните фамилия',
            'name.min' => 'Минимальная длина поля Имя 2 символа',
            'name.max' => 'Поле превышает 50 символов',
            'email.required' => 'Вы не заполнили email',
            'email.email' => 'Неправильный email',
            'pass.required' => 'Вы не заполнили Пароль',
            'pass.min' => 'Минимальная длина пароля 6 символов',
            
            
        ];
    }
}
