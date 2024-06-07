<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'check_in',
        'check_out',
        'num_guests',
        'dni',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'city',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
