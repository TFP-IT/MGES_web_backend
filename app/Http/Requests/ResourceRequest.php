<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'resource' => 'required|string',
            'action'   => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'resource.required' => 'the field resource must be defined',
            'resource.string' => 'the field resource must be a string',
            'action.required' => 'the field action must be defined',
            'action.string' => 'the field action must be a string'
        ];
    }
}
