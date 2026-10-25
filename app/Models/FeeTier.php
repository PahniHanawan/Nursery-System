<?php

namespace App\Models;

use Database\Factories\FeeTierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeTier extends Model
{
    /** @use HasFactory<FeeTierFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'age_group_name',
        'session_type',
        'rate_per_day',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'rate_per_day' => 'decimal:2',
        ];
    }
}
