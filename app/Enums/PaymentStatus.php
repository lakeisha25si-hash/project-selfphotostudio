<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case Pending = 'pending';
    case Paid = 'lunas';
    case Rejected = 'ditolak';

    /**
     * Label yang ditampilkan di antarmuka.
     */
    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Menunggu Verifikasi',
            self::Paid => 'Lunas',
            self::Rejected => 'Ditolak',
        };
    }
}