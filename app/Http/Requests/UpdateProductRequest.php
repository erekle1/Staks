<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title'           => 'sometimes|required|string|min:10|max:15',
            'product_type_id' => 'sometimes|required|exists:product_types,id',
            'amount'          => 'sometimes|required|integer',
            'creation_date'   => 'sometimes|required|date',
            'expiration_date' => 'sometimes|required|date|after_or_equal:creation_date',
        ];
    }

    public function messages()
    {
        return [
            'title.min'                      => 'The product title must be at least 10 characters.',
            'title.max'                      => 'The product title may not be greater than 15 characters.',
            'expiration_date.after_or_equal' => 'The expiration date must be a date after or equal to the creation date.',
        ];
    }

}
