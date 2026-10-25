<?php

namespace App\Enums;

enum BookingStatus: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Cancelled = 'cancelled';
    case Completed = 'completed';

    /**
     * Get the human-readable label for the status.
     */
    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending Review',
            self::Confirmed => 'Confirmed',
            self::Cancelled => 'Cancelled',
            self::Completed => 'Completed',
        };
    }

    /**
     * Get the badge color class for Tailwind.
     */
    public function badgeClasses(): string
    {
        return match ($this) {
            self::Pending => 'bg-amber-100 text-amber-800 border-amber-200',
            self::Confirmed => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            self::Cancelled => 'bg-rose-100 text-rose-800 border-rose-200',
            self::Completed => 'bg-slate-100 text-slate-800 border-slate-200',
        };
    }
}
