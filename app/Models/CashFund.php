<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFund extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'money'
    ];

    //Relaciones

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
