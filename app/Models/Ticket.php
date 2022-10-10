<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $fillable = [
        "client_id",
        "date",
        "time",
        "ticket_no",
        "airline_id",
        "airline_type",
        "airline_pnr",
        "departure",
        "destination",
        "description"
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
