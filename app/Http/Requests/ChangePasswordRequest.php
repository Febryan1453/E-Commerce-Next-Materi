<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password'                       => 'required|min:4',
            'password'                           => 'required|min:4|confirmed',
            'password_confirmation'              => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'              => 'Password sekarang dibutuhkan !',
            'password.required'                  => 'Password baru dibutuhkan !',
            'password_confirmation.required'     => 'Password konfirmasi dibutuhkan !',

            'old_password.min'                   => 'Password sekarang minimal 4 karakter!',
            'password.min'                       => 'Password baru minimal 4 karakter!',
            'password_confirmation.min'          => 'Password konfirmasi minimal 4 karakter!',
        ];
    }
}
