<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'name' => 'required|min:3',
            'description' => 'required|min:6'
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Başlık Alanı Boş Bırakılamaz.',
            'name.min' => 'Başlık Alanı Minumum 3 Karakterden Oluşmalıdır.',
            'description.required' => 'Açıklama Alanı Boş Bırakılamaz.',
            'description.min' => 'Açıklama Alanı 6 Karakterden Oluşmalıdır.',
        ];
    }
}
