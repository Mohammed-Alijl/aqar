<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'zone_id' => 'required|integer|exists:zones,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('failed_messages.city.name.required'),
            'name.max' => __('failed_messages.city.name.max'),
            'zone_id.required' => __('failed_messages.city.zone_id.required'),
            'zone_id.integer' => __('failed_messages.city.zone_id.integer'),
            'zone_id.exists' => __('failed_messages.city.zone_id.exists'),
        ];
    }
}
