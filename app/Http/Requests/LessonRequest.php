<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            "title" => "required|min:4",
            "content"=> "required|min:6",
        ];
    }

    public function messages(): array{
        return [
            "title.required"=> "Dersin başlığı boş bırakılamaz.",
            "title.min"=> "Dersin başlığı minumum 4 karakterden oluşturulmalıdır.",
            "content.required"=> "Dersin metni boş bırakılamaz.",
            "content.min"=> "Dersin metni minumum 6 karakterden oluşturulmalıdır.",
        ];
    }
}
