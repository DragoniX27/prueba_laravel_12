<?php

namespace App\Http\Requests\Api\Users;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Companie;

class CreateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $company = Companie::with(['users', 'plan'])->find($this->input('company_id'));

            if ($company->users()->count() >= $company->plan->limit_users) {
                $validator->errors()->add('company_id', 'La compañía ha alcanzado el límite de usuarios permitidos por su plan.');
            }
        });
    }
}
