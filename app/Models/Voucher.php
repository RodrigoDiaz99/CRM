<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'expense',
        'report_id'
    ];

    // Relaciones
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function report () {
        return $this->belongsTo(Report::class);
    }

    public function products () {
        return $this->belongsToMany(Product::class);
    }
}
