<?php

namespace App\Http\Requests\Api\Companies;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanieRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'plan_id' => 'required|exists:plans,id',
        ];
    }
}
