<?php

namespace App\Models;

use App\Enums\ReservationStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'code',
    'user_id',
    'package_id',
    'schedule_id',
    'total_price',
    'status',
    'customer_note',
])]
class Reservation extends Model
{
    /**
     * Konversi tipe atribut.
     * Kolom active_schedule_id dihitung database dan sengaja tidak fillable.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'total_price' => 'integer',
            'status' => ReservationStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function location(): HasOne
    {
        return $this->hasOne(ReservationLocation::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function testimonial(): HasOne
    {
        return $this->hasOne(Testimonial::class);
    }

    /**
     * Reservasi yang masih menahan slot (belum dibatalkan).
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->whereIn('status', ReservationStatus::activeValues());
    }
}