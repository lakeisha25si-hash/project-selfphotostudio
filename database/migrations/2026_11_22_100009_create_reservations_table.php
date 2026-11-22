<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->foreignId('package_id')->constrained()->restrictOnDelete();
            $table->foreignId('schedule_id')->constrained()->restrictOnDelete();
            $table->unsignedInteger('total_price');
            $table->string('status', 20)->default('menunggu');
            $table->text('customer_note')->nullable();

            // Kolom turunan untuk mencegah double booking.
            $table->unsignedBigInteger('active_schedule_id')
                ->nullable()
                ->storedAs("CASE WHEN status IN ('menunggu', 'dikonfirmasi', 'selesai') THEN schedule_id ELSE NULL END");

            $table->timestamps();

            // Satu jadwal hanya boleh memiliki satu reservasi aktif.
            $table->unique('active_schedule_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
