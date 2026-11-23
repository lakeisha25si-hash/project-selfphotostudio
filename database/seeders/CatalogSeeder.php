<?php

namespace Database\Seeders;

use App\Enums\ServiceType;
use App\Models\Facility;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        // Fasilitas: nama => kunci ikon (dipakai komponen ikon di tahap tampilan).
        $facilityIcons = [
            'Kamera mirrorless' => 'camera',
            'Remote shutter' => 'remote',
            'Backdrop pilihan' => 'backdrop',
            'Lampu studio' => 'light',
            'Properti' => 'props',
            'Cetak 4R' => 'print',
            'Soft file' => 'file',
            'Tripod' => 'tripod',
            'Lampu portabel' => 'portable-light',
        ];

        $facilities = [];

        foreach ($facilityIcons as $name => $icon) {
            $facilities[$name] = Facility::firstOrCreate(
                ['name' => $name],
                ['icon' => $icon]
            );
        }

        $studio = Service::firstOrCreate(
            ['name' => 'Sesi di Studio'],
            [
                'type' => ServiceType::Studio->value,
                'description' => 'Datang ke studio. Kamera, lampu, dan backdrop sudah siap. Kamu yang memegang remote shutter dan mengatur pose sendiri.',
                'is_active' => true,
            ]
        );

        $onDemand = Service::firstOrCreate(
            ['name' => 'On-Demand ke Rumah'],
            [
                'type' => ServiceType::OnDemand->value,
                'description' => 'Tim kami memasang perlengkapan self photo di lokasimu. Tim tidak memotret, kamu tetap berfoto sendiri.',
                'is_active' => true,
            ]
        );

        $packages = [
            [
                'service' => $studio,
                'name' => 'Solo Basic',
                'price' => 65000,
                'duration_minutes' => 20,
                'max_people' => 1,
                'is_featured' => true,
                'description' => 'Sesi singkat untuk satu orang. Atur pose dan ambil fotomu sendiri dengan remote shutter.',
                'facilities' => ['Kamera mirrorless', 'Remote shutter', 'Backdrop pilihan'],
            ],
            [
                'service' => $studio,
                'name' => 'Duo Frame',
                'price' => 110000,
                'duration_minutes' => 30,
                'max_people' => 2,
                'is_featured' => true,
                'description' => 'Untuk berdua, lengkap dengan properti dan hasil cetak ukuran 4R.',
                'facilities' => ['Kamera mirrorless', 'Lampu studio', 'Properti', 'Cetak 4R'],
            ],
            [
                'service' => $studio,
                'name' => 'Squad Session',
                'price' => 180000,
                'duration_minutes' => 45,
                'max_people' => 5,
                'is_featured' => false,
                'description' => 'Sesi seru untuk rombongan hingga lima orang, dengan hasil dalam bentuk soft file.',
                'facilities' => ['Kamera mirrorless', 'Lampu studio', 'Backdrop pilihan', 'Soft file'],
            ],
            [
                'service' => $onDemand,
                'name' => 'Home Mini',
                'price' => 250000,
                'duration_minutes' => 60,
                'max_people' => 4,
                'is_featured' => true,
                'description' => 'Perlengkapan self photo dibawa dan dipasang di rumahmu untuk sesi hingga empat orang.',
                'facilities' => ['Kamera mirrorless', 'Tripod', 'Lampu portabel', 'Soft file'],
            ],
            [
                'service' => $onDemand,
                'name' => 'Home Party',
                'price' => 450000,
                'duration_minutes' => 120,
                'max_people' => 10,
                'is_featured' => false,
                'description' => 'Sesi panjang untuk acara di rumah atau lokasi pilihanmu, hingga sepuluh orang.',
                // Placeholder: fasilitas paket ini tidak terlihat di prototipe. Ubah lewat panel admin.
                'facilities' => ['Kamera mirrorless', 'Tripod', 'Lampu portabel', 'Properti', 'Soft file'],
            ],
        ];

        foreach ($packages as $data) {
            $package = Package::firstOrCreate(
                [
                    'service_id' => $data['service']->id,
                    'name' => $data['name'],
                ],
                [
                    'price' => $data['price'],
                    'duration_minutes' => $data['duration_minutes'],
                    'max_people' => $data['max_people'],
                    'description' => $data['description'],
                    'is_active' => true,
                    'is_featured' => $data['is_featured'],
                ]
            );

            // Fasilitas hanya dipasang saat paket baru dibuat, agar perubahan admin tidak tertimpa.
            if ($package->wasRecentlyCreated) {
                $package->facilities()->sync(
                    collect($data['facilities'])
                        ->map(fn (string $name) => $facilities[$name]->id)
                        ->all()
                );
            }
        }
    }
}
