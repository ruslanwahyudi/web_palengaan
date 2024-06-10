<?php

namespace App\Http\Requests\Role_Permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
        $id = request()->segments()['2'];
        return [
            //
            'name' => 'required|unique:roles,name, ' .$id,
            'guard_name' => 'nullable'
        ];
    }
}
