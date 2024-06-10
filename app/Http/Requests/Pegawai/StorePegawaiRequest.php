<?php

namespace App\Http\Requests\Pegawai;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'jenis_pegawai' => 'required|in:ASN,NON-ASN',
            'nip' => 'nullable',
            'nik' =>'nullable',
            'golongan' => 'nullable',
            'jabatan' => 'nullable',
            'role' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nip' => str_replace('-','',$this->nip),
        ]);
    }
}