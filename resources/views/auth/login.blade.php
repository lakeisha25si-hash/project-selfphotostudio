@extends('layouts.app')

@section('title', 'Masuk — Self Studio')

@section('content')
<section class="site-container flex min-h-[75vh] items-center justify-center py-16">
    <div class="editorial-card w-full max-w-md p-7 md:p-10">
        <span class="eyebrow">Welcome back</span>
        <h1 class="mt-3 text-4xl font-bold">Good to see you.</h1>
        <p class="mt-3 text-sm leading-6 text-muted">Masuk untuk melanjutkan pengalaman self photo-mu.</p>

        <form action="{{ route('login.store') }}" method="POST" class="mt-8 space-y-5">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-field" placeholder="nama@email.com" required>
                @error('email')
                    <p class="mt-1 text-sm text-accent">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Password</label>
                <input type="password" name="password"
                    class="form-field" placeholder="Masukkan password" required>
                @error('password')
                    <p class="mt-1 text-sm text-accent">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 text-sm text-muted">
                <input type="checkbox" name="remember" value="1" class="accent-olive">
                Ingat saya
            </label>

            <button type="submit" class="btn-primary w-full">Masuk ke Akun ↗</button>
        </form>

        <p class="mt-7 text-center text-sm text-muted">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-bold text-olive-dark">Daftar di sini</a>
        </p>
    </div>
</section>
@endsection
