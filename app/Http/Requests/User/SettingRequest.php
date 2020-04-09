<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        if($this->password !== null) {
            return [
                'city_id' => ['required'],
                'phone' => ['required'],
                'password' => ['required', 'confirmed', 'min:6']
            ];
        }

        return [
            'city_id' => ['required'],
            'phone' => ['required'],
            'password' => ['nullable']
        ];
    }
}
