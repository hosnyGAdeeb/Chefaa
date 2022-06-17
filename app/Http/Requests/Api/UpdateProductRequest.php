<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends BaseApiRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'nullable|image',
            'title' => 'required|max:255|unique:products,title,' . $this->route('product'),
            'description' => 'required',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'pharmacies' => 'nullable|array',
            'pharmacies.*.id' => 'required_with:pharmacies.*.price|exists:pharmacies,id',
            'pharmacies.*.price' => 'required_with:pharmacies.*.id|numeric|min:1',
        ];
    }
}
