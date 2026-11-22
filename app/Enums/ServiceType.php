<?php

namespace App\Enums;

enum ServiceType: string
{
    case Studio = 'studio';
    case OnDemand = 'on_demand';

    /**
     * Label yang ditampilkan di antarmuka.
     */
    public function label(): string
    {
        return match ($this) {
            self::Studio => 'Sesi di Studio',
            self::OnDemand => 'On-Demand ke Rumah',
        };
    }

    /**
     * Apakah layanan ini butuh alamat dan zona jarak.
     */
    public function requiresLocation(): bool
    {
        return $this === self::OnDemand;
    }
}