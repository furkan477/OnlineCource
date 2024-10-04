<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ContactRequest extends FormRequest
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
            "subject"=> "required|min:6",
            "message"=> "required|min:12",
        ];
    }

    public function messages(): array
    {
        return [
            "subject.required"=> "Konu Alanı Boş Bırakılamaz",
            "subject.min" => "Konu Alanı Minumum 6 Karakter İçermelidir",
            "message.required"=> "Mesaj Alanı Boş Bırakılamaz",
            "message.min" => "Mesaj Alanı Minumum 12 Karakter İçermelidir",
        ];
    } 
}
