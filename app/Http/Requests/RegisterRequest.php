<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name"=> "required|min:3|string",
            "role"=> "required",
            "email"=> "required|email|min:6",
            "password"=> "required|min:6",
        ]; 
    }

    public function messages(): array{
        return [
            "name.required"=> "İsim Alanı Boş Bırakılamaz.",
            "role.required"=> "Giriş Yöntemi Alanı Boş Bırakılamaz.",
            "email.required"=> "E-Posta Alanı Boş Bırakılamaz.",
            "password.required"=> "Şifre Alanı Boş Bırakılamaz.",
            "name.min"=> "İsim Alanı Minumum 3 Karalterden Oluşturulmalıdır.",
            "email.min"=> "E-Posta Alanı Minumum 6 Karalterden Oluşturulmalıdır.",
            "password.min"=> "Şifre Alanı Minumum 6 Karalterden Oluşturulmalıdır.",
            "name.string"=> "İsim Alanı Sadece Harf İçerir.",
            "email.email"=> "E-Posta Alanı E-Posta Tipinde Olmalıdır.",
        ];
    }
}
