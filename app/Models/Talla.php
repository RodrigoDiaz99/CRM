<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Talla extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'talla',
    ];


    public function productos()
    {
        return $this->morphedByMany(Product::class, 'tallables');
    }
}
