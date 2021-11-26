<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerInquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'country' => 'required|exists:countries,id',
            'zip_code' => 'required|numeric',
            'min_order' => 'required|numeric',
            'acceptable_lead_time' => 'required|numeric',
            'type' => 'required|exists:types,id',
            'material' => 'required|exists:materials,id',
            'description' => 'nullable',
            'reference_image' => 'nullable|image',
            'reference' => 'nullable|active_url'
        ];
    }
}
