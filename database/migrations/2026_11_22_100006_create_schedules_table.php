<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')
                ->constrained('services')
                ->restrictOnDelete();

            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_available')->default(true);

            $table->timestamps();

            $table->unique(
                ['service_id', 'date', 'start_time'],
                'schedules_service_date_start_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
