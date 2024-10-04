<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            "title"=> "required|min:6",
            "description"=> "required|min:6",
            "price"=> "required|integer",
            "category_id"=> "required",
            "status"=> "required",
        ];
    }

    public function messages(): array{
        return [
            "title.required"=> "Başlık Alanı Boş Bırakılamaz.",
            "description.required"=> "Açıklama Alanı Boş Bırakılamaz.",
            "price.required"=> "Fiyat Alanı Boş Bırakılamaz.",
            "category_id.required"=> "Kategori Alanı Boş Bırakılamaz.",
            "status.required"=> "Durum Alanı Boş Bırakılamaz.",
            "title.min"=> "Başlık Alanı Minumum 6 Karakterden Oluşmalıdır.",
            "description.min"=> "Açıklama Alanı Minumum 6 Karakterden Oluşmalıdır.",
            "price.integer"=> "Fiyat Alanı Sayı Olamlıdır.",
        ];
    }
}
