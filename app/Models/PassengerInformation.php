<?php

namespace App\Models;

use App\Enums\DocumentType;
use App\Enums\Gender;
use App\Enums\VisaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property Carbon dob
 * @property Gender gender
 * @property Carbon place_of_birth
 * @property string country_of_residency
 * @property string place_of_issue
 * @property string passport_no
 * @property Carbon issue_date
 * @property Carbon expiry_date
 * @property Carbon arrival_date
 * @property string profession
 * @property string organization
 * @property int visa_duration
 * @property VisaStatus visa_status
 * @property int passenger_id
 * @property int companion_id
 * @property Passenger passenger
 * @property Document documents
 *
 */
class PassengerInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'place_of_birth',
        'country_of_residency',
        'passport_no',
        'issue_date',
        'expiry_date',
        'place_of_issue',
        'arrival_date',
        'profession',
        'organization',
        'visa_duration',
        'visa_status',
        'passenger_id',
        'companion_id'
    ];

    protected $casts = [
        'gender' => Gender::class,
        'visa_status' => VisaStatus::class
    ];

    protected $dates = [
        'dob',
        'issue_date',
        'expiry_date',
        'arrival_date'
    ];

    protected $dateFormat = 'Y-m-d';

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'passenger_info_id');
    }

    public function companion(): HasOne
    {
        return $this->hasOne(PassengerInformation::class, 'companion_id');
    }

    public function originalPassengerInfo(): BelongsTo
    {
        return $this->belongsTo(PassengerInformation::class, 'companion_id');
    }

    public function personalPicture(): Model|Document|null
    {
        return $this->documents()->where('document_type', '=', DocumentType::PERSONAL_PICTURE)->first();
    }

    public function passportPicture(): Model|Document|null
    {
        return $this->documents()->where('document_type', '=', DocumentType::PASSPORT_PICTURE)->first();
    }
}
