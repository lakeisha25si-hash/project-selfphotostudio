<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case Transfer = 'transfer';
    case Qris = 'qris';
    case Cash = 'tunai';

    /**
     * Label yang ditampilkan di antarmuka.
     */
    public function label(): string
    {
        return match ($this) {
            self::Transfer => 'Transfer Bank',
            self::Qris => 'QRIS',
            self::Cash => 'Tunai',
        };
    }
}