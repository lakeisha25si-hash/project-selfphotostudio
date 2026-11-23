<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('studio.admin.email');
        $password = config('studio.admin.password');

        if (blank($email) || blank($password)) {
            $this->command?->warn('ADMIN_EMAIL dan ADMIN_PASSWORD belum diisi di .env. Akun admin dilewati.');

            return;
        }

        if (strlen($password) < 8) {
            $this->command?->warn('ADMIN_PASSWORD minimal 8 karakter. Akun admin dilewati.');

            return;
        }

        $admin = User::firstOrNew(['email' => $email]);

        if ($admin->exists) {
            $this->command?->info('Akun admin sudah ada, tidak diubah.');

            return;
        }

        $admin->name = config('studio.admin.name');
        $admin->password = $password;
        $admin->role = UserRole::Admin;
        $admin->save();

        $this->command?->info('Akun admin dibuat: '.$email);
    }
}
