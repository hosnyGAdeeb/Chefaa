<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\DocBlock\Description;

class ProductStoreRequest extends FormRequest
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
            'image' => 'required|image',
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'pharmacies' => 'nullable|array',
            'pharmacies.*.id' => 'required_with:pharmacies.*.price|exists:pharmacies,id',
            'pharmacies.*.price' => 'required_with:pharmacies.*.id|numeric|min:1',
        ];
    }
}
