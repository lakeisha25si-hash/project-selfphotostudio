<?php

namespace App\Enums;

enum ReservationStatus: string
{
    case Pending = 'menunggu';
    case Confirmed = 'dikonfirmasi';
    case Completed = 'selesai';
    case Cancelled = 'dibatalkan';

    /**
     * Label yang ditampilkan di antarmuka.
     */
    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Menunggu',
            self::Confirmed => 'Dikonfirmasi',
            self::Completed => 'Selesai',
            self::Cancelled => 'Dibatalkan',
        };
    }

    /**
     * Apakah status ini masih menahan slot jadwal.
     * Hanya reservasi yang dibatalkan yang melepas slot.
     */
    public function holdsSchedule(): bool
    {
        return $this !== self::Cancelled;
    }

    /**
     * Nilai status yang menahan slot jadwal.
     * Harus sama dengan daftar status pada kolom active_schedule_id di migration reservations.
     *
     * @return array<int, string>
     */
    public static function activeValues(): array
    {
        $values = [];

        foreach (self::cases() as $status) {
            if ($status->holdsSchedule()) {
                $values[] = $status->value;
            }
        }

        return $values;
    }
}