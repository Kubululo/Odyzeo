<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

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
            'name' => 'required|max:200',
            'email' => 'required|max:100|email:rfc,dns',
            'photo' => 'max:2048|mimes:jpeg,jpg,png|sometimes|nullable',
            'message' => 'max:2000'
        ];
    }
}
