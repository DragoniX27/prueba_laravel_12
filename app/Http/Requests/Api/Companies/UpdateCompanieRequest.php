<?php

namespace App\Http\Requests\Api\Companies;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanieRequest extends FormRequest
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
            'id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'plan_id' => 'sometimes|exists:plans,id',
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        $data['id'] = $this->route('company');
        return $data;
    }
}
