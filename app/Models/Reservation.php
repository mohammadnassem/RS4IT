<?php

namespace App\Models;

use App\Enums\RoamType;
use App\Enums\RoomType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property Carbon check_in_date
 * @property Carbon check_out_date
 * @property RoomType room_type
 * @property int extra_reservation_id
 * @property int passenger_id
 * @property Passenger passenger
 * @property Reservation extraNight
 * @property Reservation originalReservation
 *
 */
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'check_in_date',
        'check_out_date',
        'room_type',
        'extra_reservation_id', // Extra night.
        'passenger_id'
    ];

    protected $casts = [
        'room_type' => RoomType::class
    ];

    protected $dates = [
        'check_in_date',
        'check_out_date'
    ];

    protected $dateFormat = 'Y-m-d';

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class);
    }

    public function extraNight(): HasOne
    {
        return $this->hasOne(Reservation::class, 'extra_reservation_id');
    }

    public function originalReservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'extra_reservation_id');
    }
}
