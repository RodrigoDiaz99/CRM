<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cash_fund_id',
        'voucher_id',
        'user_id'
    ];

    // Relaciones
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function cash_fund () {
        return $this->belongsTo(CashFund::class);
    }

    public function vouchers () {
        return $this->hasMany(Voucher::class);
    }
    
}
