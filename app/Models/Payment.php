<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        "month",
        "user_id",
        "salary",
        "incentive_pay",
        "net_pay",
        "tax",
        "deduction_title",
        "deduction_amount",
        "payment_date"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
