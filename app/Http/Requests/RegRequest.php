<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            
            'name' => 'required|min:2|max:50|string|regex:/^[^\d]+$/',
            'second_name' => 'required|min:2|max:50|string|regex:/^[^\d]+$/',
            'groupp' => 'required|string',
            'date' => 'required|date',
            'phone' => 'required|min:18|max:18|string',
            'pass' => 'required|min:6|string',
            'email' => 'required|email|unique:users,email|string'
            
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Заполните фамилия',
            'name.regex' => 'Поле не должно содержать цифры',
            'name.min' => 'Минимальная длина поля Имя 2 символа',
            'name.max' => 'Поле превышает 50 символов',
            'name.string' => 'Некорректное Имя',
            'email.required' => 'Вы не заполнили email',
            'email.email' => 'Неправильный email',
            'email.unique' => 'Такой email уже существует',
            'pass.required' => 'Вы не заполнили Пароль',
            'pass.min' => 'Минимальная длина пароля 6 символов',
            'phone.required' => 'Заполните Телефон',
            'phone.min' => 'Телефон должен быть из 11 цифр',
            'phone.max' => 'Телефон превышает 11 цифр',
            'groupp.required' => 'Выберите группу',
            'date.required' => 'Введите дату рождения',
            'second_name.required' => 'Заполните поле Фамилия',
            'second_name.min' => 'Минимальная длина поля Фамилия 2 символа',
            'second_name.max' => 'Поле превышает 50 символов',
            'second_name.regex' => 'Поле не должно содержать цифры',
            'second_name.string' => 'Некорректная Фамилия'
            
        ];
    }
}
