<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['reservation_id', 'address', 'district', 'setup_note', 'transport_fee'])]
class ReservationLocation extends Model
{
    /**
     * Konversi tipe atribut.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'transport_fee' => 'integer',
        ];
    }

    /**
     * Label zona jarak, dibaca dari config/transport.php.
     */
   protected function zoneLabel(): Attribute
{
    return Attribute::get(
        fn () => config("transport.zones.{$this->district}.label")
            ?? collect(config('transport.zones'))
                ->firstWhere('label', $this->district)['label'] ?? null
    );
}

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}