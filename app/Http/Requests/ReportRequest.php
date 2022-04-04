<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:200',
            'email' => 'required|max:100|email:rfc,dns',
            'image' => 'image|max:2048|mimes:jpeg,jpg,png|sometimes|nullable|required_without:message',
            'message' => 'max:2000|required_without:image'
        ];
    }
}
