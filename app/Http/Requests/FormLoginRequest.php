<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function attributes() 
    {
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ];
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages() 
    {
        return [
            '*.required' => ':attribute bắt buộc phải nhập',
            '*.email' => ':attribute không đúng định dạng'
        ];
    }
}
