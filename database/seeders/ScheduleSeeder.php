<?php

namespace Database\Seeders;

use App\Enums\ServiceType;
use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Jumlah hari ke depan (termasuk hari ini) yang dibuatkan slot.
     */
    private const DAYS_AHEAD = 14;

    public function run(): void
    {
        // Jenis layanan => daftar [jam mulai, jam selesai].
        $slots = [
            ServiceType::Studio->value => [
                ['09:00', '10:30'],
                ['10:30', '12:00'],
                ['12:00', '13:30'],
                ['13:30', '15:00'],
                ['15:00', '16:30'],
                ['16:30', '18:00'],
                ['19:00', '20:30'],
            ],
            ServiceType::OnDemand->value => [
                ['09:00', '11:00'],
                ['13:00', '15:00'],
                ['16:00', '18:00'],
            ],
        ];

        $services = Service::all()->keyBy(fn (Service $service) => $service->type->value);

        foreach ($slots as $type => $times) {
            $service = $services->get($type);

            if (! $service) {
                $this->command?->warn("Layanan bertipe {$type} belum ada. Jalankan CatalogSeeder dulu.");

                continue;
            }

            for ($i = 0; $i < self::DAYS_AHEAD; $i++) {
                $date = today()->addDays($i)->toDateString();

                foreach ($times as [$start, $end]) {
                    Schedule::firstOrCreate(
                        [
                            'service_id' => $service->id,
                            'date' => $date,
                            'start_time' => $start,
                        ],
                        [
                            'end_time' => $end,
                            'is_available' => true,
                        ]
                    );
                }
            }
        }
    }
}
