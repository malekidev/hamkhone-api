<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCompleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->user()->profile()->count() > 0){
            abort(403,"شما قبلا پروفایل خود را تکمیل کرده اید");
        }
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
            "sex" => "required",
            "age" => "required",
            "job" => "required",
            "phone" => "unique:profiles|required",
        ];
    }
}
