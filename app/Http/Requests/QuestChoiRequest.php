<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestChoiRequest extends FormRequest
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
            "question" => 'required|min:6',
            "choice.0.text" => 'required|min:3',
            "choice.1.text" => 'required|min:3',
            "choice.2.text" => 'required|min:3',
            "choice.3.text" => 'required|min:3',
            "choice.0.is_correct" => 'required',
            "choice.1.is_correct" => 'required',
            "choice.2.is_correct" => 'required',
            "choice.3.is_correct" => 'required',
        ];
    }

    public function messages(): array{
        return [
            "question.required" => 'Soru Alanı Zorunludur',
            "question.min" => "Soru Alanı Minumum 6 Karakterden Oluşmalıdır",
            "choice.0.text.required" => 'Cevap 1 Alanına Metin Zorunludur',
            "choice.0.text.min" => "Cevap 1 Alanı Minumum 3 Karakterden Oluşmalıdır",
            "choice.1.text.required" => 'Cevap 2 Alanına Metin Zorunludur',
            "choice.1.text.min" => "Cevap 2 Alanı Minumum 3 Karakterden Oluşmalıdır",
            "choice.2.text.required" => 'Cevap 3 Alanına Metin Zorunludur',
            "choice.2.text.min" => "Cevap 3 Alanı Minumum 3 Karakterden Oluşmalıdır",
            "choice.3.text.required" => 'Cevap 4 Alanına Metin Zorunludur',
            "choice.3.text.min" => "Cevap 4 Alanı Minumum 3 Karakterden Oluşmalıdır",
            "choice.0.is_correct.required" => 'Cevap 1 Alanına Cevap Zorunludur',
            "choice.1.is_correct.required" => 'Cevap 2 Alanına Cevap Zorunludur',
            "choice.2.is_correct.required" => 'Cevap 3 Alanına Cevap Zorunludur',
            "choice.3.is_correct.required" => 'Cevap 4 Alanına Cevap Zorunludur',
        ];
    }
}
