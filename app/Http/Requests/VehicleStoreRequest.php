<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
            'klijent_id' => ['required', 'integer', 'exists:user,id'],
            'registarski_broj' => ['required', 'string'],
            'marka' => ['required', 'string'],
            'model' => ['required', 'string'],
            'godina_proizvodnje' => ['required', 'integer'],
        ];
    }
}
