<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManajemensuratRequest extends FormRequest
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
            //
            'no_surat' => 'required',
            'perihal' => 'required',
            'pengirim' => 'required',
            'tanggal_surat' => 'required',
            'jenis_surat' => 'required',
            'lampiran' => 'nullable',
            'disposisi_ke' => 'nullable',
        ];
    }
}
