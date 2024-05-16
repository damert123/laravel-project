<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EditMembRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {

        $id = $this->route('id');
        return [
            'name' => 'required|min:2|max:50|string|regex:/^[^\d]+$/',
            'second_name' => 'required|min:2|max:50|string|regex:/^[^\d]+$/',
            'groupp' => 'required|string',
            'date' => 'required|date',
            'phone' => 'required|min:18|max:18|string',
            'about' => 'string|max:1000',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|integer'
        ];
    }

     public function messages(){
        return[
            'name.required' => 'Заполните Имя',
            'name.regex' => 'Имя содержит цифры',
            'name.min' => 'Минимальная длина поля Имя 2 символа',
            'name.max' => 'Поле превышает 50 символов',
            'name.string' => 'Некорректное Имя',
            'email.required' => 'Вы не заполнили email',
            'email.email' => 'Неправильный email',
            'email.unique' => 'Такой email уже существует',
            'phone.required' => 'Заполните Телефон',
            'phone.min' => 'Телефон должен быть из 11 цифр',
            'phone.max' => 'Телефон превышает 11 цифр',
            'groupp.required' => 'Выберите группу',
            'date.required' => 'Введите дату рождения',
            'second_name.required' => 'Заполните поле Фамилия',
            'second_name.min' => 'Минимальная длина поля Фамилия 2 символа',
            'second_name.max' => 'Поле превышает 50 символов',
            'second_name.regex' => 'Фамилия содержит цифры',
            'second_name.string' => 'Некорректная Фамилия',
            'about.max' => 'Поле превышает 1000 символов',
            'role.required' => 'Выберите роль',
            'role.integer' => 'Некорректная роль'
        ];
    }
}
