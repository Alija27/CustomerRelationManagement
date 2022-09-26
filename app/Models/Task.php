<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "department_id",
        "purpose_id",
        "remarks",
        "client_id",
        "status"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
