<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryData extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'country',
        'state',
        'city',
        'street',
        'number_exterior',
        'suburb',
        'zip',
        'reference',
    ];

    // Relaciones
    public function user(){
        return $this->belongsTo(User::class);
    }
}
