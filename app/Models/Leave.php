<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "subject",
        "date",
        "status",
        "image",


    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
