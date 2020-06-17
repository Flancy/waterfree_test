<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class DilerMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'firm' => ['required'],
            'city' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "ФИО" обязательно для заполнения!',
            'email.required' => 'Поле "E-mail" обязательно для заполнения!',
            'firm.required' => 'Поле "Фирма" обязательно для заполнения!',
            'city.required' => 'Поле "Город" обязательно для заполнения!',
        ];
    }
}
