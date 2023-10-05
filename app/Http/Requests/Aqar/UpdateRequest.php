<?php

namespace App\Http\Requests\Aqar;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $size = $this->input('attributes') ? count($this->input('attributes')) : 0;
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'zone_id' => 'required|integer|exists:zones,id',
            'city_id' => 'required|integer|exists:cities,id',
            'category_id' => 'required|integer|exists:categories,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'attachments' => 'array',
            'attachments.*' => 'required|image',
            'attributes' => 'nullable|array|unique_values|size:' .  $size,
            'attributes.*' => 'integer|exists:attributes,id',
            'values' => 'nullable|array|unique_values|size:' .  $size,
            'values.*' => 'string|max:255',
            'related_aqars' => 'nullable|array|unique_values',
            'related_aqars.*' => 'integer|exists:aqars,id',
            'price' => 'required|numeric',
            'email' => 'nullable|email|string|max:255',
            'mobile_number' => 'nullable|numeric',
            'whatsapp_number' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('failed_messages.aqar.title.required'),
            'title.max' => __('failed_messages.aqar.title.max'),
            'description.required' => __('failed_messages.aqar.description.required'),
            'zone_id.required' => __('failed_messages.aqar.zone_id.required'),
            'zone_id.integer' => __('failed_messages.aqar.zone_id.integer'),
            'zone_id.exists' => __('failed_messages.aqar.zone_id.exists'),
            'latitude.required' => __('failed_messages.aqar.latitude.required'),
            'latitude.numeric' => __('failed_messages.aqar.latitude.numeric'),
            'longitude.required' => __('failed_messages.aqar.longitude.required'),
            'longitude.numeric' => __('failed_messages.aqar.longitude.numeric'),
            'attachments.required' => __('failed_messages.aqar.attachments.required'),
            'attachments.array' => __('failed_messages.aqar.attachments.array'),
            'attachments.*.image' => __('failed_messages.aqar.attachments.*.image'),
            'attributes.array' => __('failed_messages.aqar.attributes.array'),
            'attributes.*.integer' => __('failed_messages.aqar.attributes.*.integer'),
            'attributes.*.exists' => __('failed_messages.aqar.attributes.*.exists'),
            'values.array' => __('failed_messages.aqar.values.array'),
            'values.*.integer' => __('failed_messages.aqar.values.*.integer'),
            'values.*.exists' => __('failed_messages.aqar.values.*.exists'),
            'related_aqars.array' => __('failed_messages.aqar.related_aqars.array'),
            'related_aqars.*.integer' => __('failed_messages.aqar.related_aqars.*.integer'),
            'related_aqars.*.exists' => __('failed_messages.aqar.related_aqars.*.exists'),
        ];
    }
}
