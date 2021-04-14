<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_paths',
        'name',
        'description',
        'category_id'
    ];

    // Relaciones
    public function voucher () {
        return $this->belongsToMany(Voucher::class);
    }

    public function wishList () {
        return $this->belongsTo(WishList::class);
    }

    public function promotions () {
        return $this->belongsToMany(Promotion::class);
    }

    public function comments () {
        return $this->hasMany(CommentProduct::class);
    }

    public function scores () {
        return $this->hasMany(ScoreProduct::class);
    }
    
    public function Inventories () {
        return $this->hasOne(InventoryProduct::class);
    }

    public function soldProduct () {
        return $this->hasOne(SoldProduct::class);
    }

    public function Categories () {
        return $this->belongsTo(CategoryProduct::class);
    }
}
