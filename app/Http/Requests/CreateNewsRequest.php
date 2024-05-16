<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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

            'header' => 'required|string|max:255|min:10',
            'members' => 'string|max:10',
            'descrip' => 'string|max:3000|min:20',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages(){
        return[
            'header.required' => 'Заполните Заголовок',
            'header.string' => 'Некорректный заголовок',
            'header.max' => 'Заголовок превышает 255 символов.',
            'header.min' => 'Минимальная длина 10 символов',
            'members.string' => 'Некорректное значение',
            'members.max' => 'Максимальная длина Участников 10 символов',
            'descrip.string' => 'Некорректное описание',
            'descrip.max' => 'Описание превышает 3000 символов',
            'descrip.min' => 'Миимальная длина 10 символов',
            'picture.required' => 'Добавьте изображение новости',
            'picture.mimes' => 'Недопустимый формат изображения',
            'picture.image' => 'Некорректное изображение',
            'picture.max' => 'Разрешение изображения превышает 2048 в ширину',
            
        ];
    }
}
