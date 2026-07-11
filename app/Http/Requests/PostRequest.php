<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class PostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|min:2",
            "body" => "required|string|min:15",
        ];
    }
    public function messages()
    {
        return [
            "titel.required" => "Plessase add the title of post",
            "titel.min" => "The titel of post must be 6 characters",
            "body.required" => "Please add the descriptions of the post"
        ];
    }
}
