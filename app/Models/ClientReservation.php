<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'dni',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'city',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
