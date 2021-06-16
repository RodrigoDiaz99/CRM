<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;
    protected $fillable = [
         'product_id',
        'quantity',
        'price',
        'subtotal'
    ];
    protected $table = 'product_list';
    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
