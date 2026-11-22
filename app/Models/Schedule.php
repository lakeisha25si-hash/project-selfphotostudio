<?php

namespace App\Models;

use App\Enums\ReservationStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['service_id', 'date', 'start_time', 'end_time', 'is_available'])]
class Schedule extends Model
{
    /**
     * Konversi tipe atribut.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'date',
            'is_available' => 'boolean',
        ];
    }

    /**
     * Rentang jam dalam format "09:00 - 10:30".
     */
    protected function timeRange(): Attribute
    {
        return Attribute::get(
            fn () => substr($this->start_time, 0, 5).' - '.substr($this->end_time, 0, 5)
        );
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Seluruh reservasi pada slot ini, termasuk yang sudah dibatalkan (riwayat).
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Reservasi yang saat ini menahan slot (paling banyak satu).
     */
    public function activeReservation(): HasOne
    {
        return $this->hasOne(Reservation::class)
            ->whereIn('status', ReservationStatus::activeValues());
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('is_available', true);
    }
}