<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * @property int id
 * @property string phone_number
 * @property string email
 * @property string otp
 * @property int companion_id
 * @property Passenger companion
 * @property Passenger originalPassenger
 * @property PassengerInformation passengerInfo
 * @property Collection<Reservation> reservations
 *
 */
class Passenger extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'phone_number',
        'email',
        'otp'
    ];

    public function passengerInfo(): HasOne
    {
        return $this->hasOne(PassengerInformation::class, 'passenger_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
