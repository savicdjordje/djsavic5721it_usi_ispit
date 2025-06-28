<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'vozilo_id' => ['required', 'integer', 'exists:vehicle,id'],
            'zaposleni_id' => ['required', 'integer', 'exists:user,id'],
            'admin_id' => ['required', 'integer', 'exists:user,id'],
            'status_id' => ['required', 'integer', 'exists:status,id'],
            'naziv' => ['required', 'string'],
            'opis' => ['nullable', 'string'],
        ];
    }
}
