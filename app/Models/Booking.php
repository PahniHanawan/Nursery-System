<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Database\Factories\BookingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    /** @use HasFactory<BookingFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'parent_name',
        'email',
        'phone',
        'child_age_or_dob',
        'preferred_date',
        'preferred_time',
        'intended_start_date',
        'notes',
        'status',
        'internal_notes',
        'gdpr_consent',
        'ip_address',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'preferred_date' => 'date',
            'status' => BookingStatus::class,
            'gdpr_consent' => 'boolean',
        ];
    }

    /**
     * Anonymize the booking record for GDPR Right to be Forgotten compliance.
     */
    public function anonymize(): void
    {
        $this->update([
            'parent_name' => '[GDPR_ERASED]',
            'email' => 'erased_'.$this->id.'@anonymized.local',
            'phone' => '[GDPR_ERASED]',
            'child_age_or_dob' => '[GDPR_ERASED]',
            'notes' => null,
            'ip_address' => null,
        ]);
    }

    /**
     * Check if the booking record has been erased under GDPR.
     */
    public function isAnonymized(): bool
    {
        return $this->parent_name === '[GDPR_ERASED]';
    }
}
