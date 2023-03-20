<?php

namespace App\Models;

use App\Enums\DocumentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property DocumentType document_type
 * @property string document_src
 * @property int passenger_info_id
 * @property PassengerInformation passengerInfo
 */
class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type',
        'document_src',
        'passenger_info_id'
    ];

    protected $casts = [
        'document_type' => DocumentType::class
    ];

    public function getDocumentSrcAttribute(string $src): string
    {
        return asset("storage/docs/$this->document_type/$src");
    }

    public function passengerInfo(): BelongsTo
    {
        return $this->belongsTo(PassengerInformation::class, 'passenger_info_id');
    }
}
