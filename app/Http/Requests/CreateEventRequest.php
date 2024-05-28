<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            'descrip' => 'required|string|min:20|max:3000',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after_or_equal:time_start',
            'organizer' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'require' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
{
    return [
        'header.required' => 'Поле "Заголовок" обязательно для заполнения',
        'header.string' => 'Некорректный формат поля "Заголовок"',
        'header.max' => 'Максимальная длина поля "Заголовок" - 255 символов',
        'header.min' => 'Минимальная длина поля "Заголовок" - 10 символов',
        'descrip.required' => 'Поле "Описание" обязательно для заполнения',
        'descrip.string' => 'Некорректный формат поля "Описание"',
        'descrip.max' => 'Максимальная длина поля 3000 символов',
        'descrip.min' => 'Минимальная длина поля - 20 символов',
        'date_start.required' => 'Поле "Дата начала" обязательно для заполнения',
        'date_start.date' => 'Некорректный формат поля "Дата начала"',
        'date_end.date' => 'Некорректный формат поля "Дата окончания"',
        'date_end.after_or_equal' => 'Дата указана позже даты начала',
        'time_start.required' => 'Укажите время начала',
        'time_start.date_format' => 'Некооретное время',
        'time_end.required' => 'Укажите время начала',
        'time_end.date_format' => 'Некооретное время',
        'time_end.after_or_equal' => 'Время позже времени начала',
        'organizer.required' => 'Поле "Организатор" обязательно для заполнения',
        'organizer.string' => 'Некорректный формат поля "Организатор"',
        'organizer.max' => 'Максимальная длина поля "Организатор" - 255 символов',
        'location.required' => 'Поле "Место проведения" обязательно для заполнения',
        'location.string' => 'Некорректный формат поля "Место проведения"',
        'location.max' => 'Максимальная длина поля "Место проведения" - 255 символов',
        'require.string' => 'Некорректный формат поля "Требования"',
        'require.max' => 'Максимальная длина поля - 255 символов',
        'picture.mimes' => 'Допустимые форматы изображения: JPEG, PNG, JPG',
        'picture.image' => 'Некорректное изображение',
        'picture.max' => 'Максимальное разрешение изображения - 2048px в ширину',
    ];
}
}
