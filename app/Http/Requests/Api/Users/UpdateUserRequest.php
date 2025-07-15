<?php

namespace App\Http\Requests\Api\Users;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Companie;

class UpdateUserRequest extends FormRequest
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
            'id' => 'required|exists:users,id',
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $this->route('user'),
            'password' => 'sometimes|string',
            'company_id' => 'sometimes|exists:companies,id',
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        $data['id'] = $this->route('user');
        return $data;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->input('company_id')) {
                return;
            }
            $company = Companie::with(['users', 'plan'])->find($this->input('company_id'));

            if ($company->users()->count() >= ($company->plan->limit_users)) {
                $validator->errors()->add('company_id', 'La compañía ha alcanzado el límite de usuarios permitidos por su plan.');
            }
        });
    }
}
