@extends('layouts.app')

@section('title', 'Dashboard Admin — Self Studio')

@section('content')
<section class="site-container py-12">
    <span class="eyebrow">Administration</span>
    <h1 class="mt-3 text-4xl font-bold">Hello, {{ auth()->user()->name }}.</h1>
    <p class="mt-3 text-muted">Selamat datang di panel pengelolaan Self Studio.</p>

    <div class="mt-10 grid gap-5 md:grid-cols-3">
        <div class="editorial-card p-7">
            <p class="text-sm text-muted">Reservasi</p>
            <p class="mt-3 font-display text-3xl font-bold">—</p>
            <p class="mt-2 text-xs text-muted">Akan terhubung pada Tahap 5</p>
        </div>

        <div class="editorial-card p-7">
            <p class="text-sm text-muted">Paket layanan</p>
            <p class="mt-3 font-display text-3xl font-bold">—</p>
            <p class="mt-2 text-xs text-muted">Akan terhubung pada Tahap 6</p>
        </div>

        <div class="editorial-card p-7">
            <p class="text-sm text-muted">Pendapatan</p>
            <p class="mt-3 font-display text-3xl font-bold">—</p>
            <p class="mt-2 text-xs text-muted">Akan terhubung pada Tahap 6</p>
        </div>
    </div>
</section>
@endsection
