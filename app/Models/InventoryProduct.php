<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'total_count',
        'purchase_price',
        'percent_of_profit',
        'sale_price',
        'cost_of_shipping'
    ];

    //Relaciones
    public function Product () {
        return $this->belongsTo(Product::class);
    }
}
