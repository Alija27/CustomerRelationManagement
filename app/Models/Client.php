<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "address",
        "phonenumber",
        "email",
        "user_id",
        "dob",
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
