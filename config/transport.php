<?php

/*
 * Zona jarak dan tarif transport untuk layanan On-Demand Home Service.
 * Kunci zona disimpan di kolom reservation_locations.district,
 * sedangkan tarifnya disalin ke kolom transport_fee saat reservasi dibuat.
 */

return [

    'zones' => [

        'zona_1' => [
            'label' => 'Zona 1',
            'description' => '0 sampai 5 km dari studio',
            'fee' => 20000,
        ],

        'zona_2' => [
            'label' => 'Zona 2',
            'description' => 'Lebih dari 5 sampai 10 km dari studio',
            'fee' => 35000,
        ],

        'zona_3' => [
            'label' => 'Zona 3',
            'description' => 'Lebih dari 10 km dari studio',
            'fee' => 50000,
        ],

    ],

];