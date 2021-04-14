<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'product_id',
        'description',
        'cash_discount',
        'expiration_date',
        'user_id'
    ];

    // Relaciones
    public function userAt () {
        return $this->belongsTo(User::class);
    }

    public function users () {
        return $this->belongsToMany(User::class);
    }

    public function products () {
        return $this->belongsToMany(Product::class);
    }
}
