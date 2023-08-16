<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'title'           => $this->title,
            'amount'          => $this->amount,
            'product_type'    => $this->productType->title,
            'creation_date'   => $this->creation_date,
            'expiration_date' => $this->expiration_date,
        ];
    }
}
