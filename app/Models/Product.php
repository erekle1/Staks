<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_type_id',
        'amount',
        'creation_date',
        'expiration_date',
        'user_id'
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
