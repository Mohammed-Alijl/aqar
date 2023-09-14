<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateogryRequest extends FormRequest
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
            'display_main' => 'required|boolean',
            'display_order' => 'nullable|integer|required_if:display_main,1'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => __('failed_messages.category.name.required'),
          'name.max' => __('failed_messages.category.name.max'),
          'display_main.required' => __('failed_messages.category.display_main.required'),
          'display_main.boolean' => __('failed_messages.category.display_main.boolean'),
          'display_order.integer' => __('failed_messages.category.display_order.integer'),
          'display_order.required_if' => __('failed_messages.category.display_order.required_if'),
        ];
    }
}
