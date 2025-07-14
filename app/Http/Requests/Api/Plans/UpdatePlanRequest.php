<?php

namespace App\Http\Requests\Api\Plans;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
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
            'id' => 'required|exists:plans,id',
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric|min:0',
            'limit_users' => 'required|integer|min:1',
            'features' => 'required|string|max:255',
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        $data['id'] = $this->route('plan');
        return $data;
    }
}
