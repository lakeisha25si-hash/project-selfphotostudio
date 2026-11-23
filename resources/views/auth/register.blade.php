@extends('layouts.app')

@section('title', 'Daftar — Self Studio')

@section('content')
<section class="site-container flex min-h-[75vh] items-center justify-center py-16">
    <div class="editorial-card w-full max-w-md p-7 md:p-10">
        <span class="eyebrow">Join the experience</span>
        <h1 class="mt-3 text-4xl font-bold">Let's get started.</h1>
        <p class="mt-3 text-sm leading-6 text-muted">Buat akun untuk memesan sesi self photo.</p>

        <form action="{{ route('register.store') }}" method="POST" class="mt-8 space-y-4">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-semibold">Nama lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="form-field" placeholder="Nama kamu" required>
                @error('name') <p class="mt-1 text-sm text-accent">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-field" placeholder="nama@email.com" required>
                @error('email') <p class="mt-1 text-sm text-accent">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Nomor telepon</label>
                <input type="tel" name="phone" value="{{ old('phone') }}"
                    class="form-field" placeholder="08xxxxxxxxxx">
                @error('phone') <p class="mt-1 text-sm text-accent">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Password</label>
                <input type="password" name="password"
                    class="form-field" placeholder="Minimal 8 karakter" required>
                @error('password') <p class="mt-1 text-sm text-accent">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Konfirmasi password</label>
                <input type="password" name="password_confirmation"
                    class="form-field" placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn-primary w-full">Buat Akun ↗</button>
        </form>

        <p class="mt-7 text-center text-sm text-muted">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-bold text-olive-dark">Masuk di sini</a>
        </p>
    </div>
</section>
@endsection
