<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

            'brand' => 'required|string|max:100',
            'category' => 'required|string|max:100',

            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',

            'model' => 'required|string|max:100',

            'batch' => [
                'required',
                'string',
                'max:50',
                Rule::unique('products')->where(fn ($q) =>
                    $q->where('model', $this->input('model'))
                )
            ],

            'manufactured_at' => 'required|date',

            'status' => 'nullable|in:available,reserved,disposed',

            'notes' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'model.required' => 'Model is required',
            'batch.required' => 'Batch is required',
            'manufactured_at.required' => 'Manufacturing date is required',
            'status.in' => 'Invalid status value',
        ];
    }
}