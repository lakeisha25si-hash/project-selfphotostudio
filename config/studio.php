<?php

return [

    /*
     * Akun admin awal. Nilai dibaca dari .env agar kredensial
     * tidak tertulis di dalam kode.
     */
    'admin' => [
        'name' => env('ADMIN_NAME', 'Admin Studio'),
        'email' => env('ADMIN_EMAIL'),
        'password' => env('ADMIN_PASSWORD'),
    ],

];
