<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title'           => 'required|string|min:10|max:15',
            'product_type_id' => 'required|exists:product_types,id',
            'amount'          => 'integer',
            'creation_date'   => 'required|date',
            'expiration_date' => 'required|date|after_or_equal:creation_date',
        ];
    }

}
