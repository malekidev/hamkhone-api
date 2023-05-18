<?php

namespace App\Http\Requests;

use App\Models\Home;
use Illuminate\Foundation\Http\FormRequest;

class CreateHomeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required",
            "slug" => "unique:homes|required",
            "address" => "required",
            "price" => "required",
        ];
    }
    public function prepareForValidation()
    {
        return $this->merge([
            "slug" => \Str::slug($this->slug)
        ]);
    }
}
