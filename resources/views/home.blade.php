@extends('layouts.app')

@section('title', 'Self Studio — Your Moment, Your Story')

@section('content')

<section class="site-container grid items-center gap-10 py-16 md:grid-cols-2 md:py-24">
    <div>
        <span class="eyebrow">A different kind of photo experience</span>

        <h1 class="mt-5 max-w-xl text-5xl font-bold leading-[1.05] md:text-7xl">
            It's your moment.
            <span class="text-olive">Take the shot.</span>
        </h1>

        <p class="mt-6 max-w-md text-base leading-8 text-muted">
            Bukan sekadar foto. Ciptakan momen, berekspresi sebebas mungkin,
            dan abadikan cerita dengan caramu sendiri.
        </p>

        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('register') }}" class="btn-primary">
                Mulai Sesi Foto ↗
            </a>
            <a href="#layanan" class="btn-outline">
                Jelajahi Layanan
            </a>
        </div>

        <p class="mt-8 text-xs font-semibold uppercase tracking-widest text-muted">
            No photographer. No pressure. Just you.
        </p>
    </div>

    <div class="relative">
        <div class="relative flex min-h-[430px] items-center justify-center overflow-hidden rounded-[32px] bg-olive-light p-8">
            <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-accent/20 blur-2xl"></div>
            <div class="absolute -bottom-20 -left-10 h-64 w-64 rounded-full bg-olive/30 blur-2xl"></div>

            <div class="relative w-full max-w-sm rotate-[-3deg] rounded-[25px] border-[10px] border-white bg-white p-4 shadow-2xl">
                <div class="flex aspect-[4/5] flex-col items-center justify-center rounded-xl bg-gradient-to-br from-[#d9c6b1] via-[#b7b99f] to-[#68765e] text-center">
                    <span class="font-display text-5xl font-bold text-white">SMILE!</span>
                    <span class="mt-3 text-xs font-semibold uppercase tracking-[.3em] text-white">Your own story</span>
                </div>
                <p class="mt-3 text-center font-display text-xl font-bold">A little piece of you.</p>
            </div>

            <div class="absolute bottom-8 right-5 rotate-6 rounded-full bg-accent px-5 py-3 text-sm font-bold text-white shadow-lg">
                Say cheese! ✳
            </div>
        </div>
    </div>
</section>

<section id="layanan" class="bg-surface py-20">
    <div class="site-container">
        <div class="max-w-xl">
            <span class="eyebrow">Find your experience</span>
            <h2 class="mt-3 text-4xl font-bold md:text-5xl">Your space, your way.</h2>
            <p class="mt-4 leading-7 text-muted">
                Mau datang ke studio atau menikmati pengalaman self photo di tempatmu sendiri?
                Pilih cara yang paling cocok untukmu.
            </p>
        </div>

        <div class="mt-10 grid gap-5 md:grid-cols-2">
            <article class="editorial-card overflow-hidden p-7 md:p-9">
                <div class="mb-8 flex h-44 items-center justify-center rounded-2xl bg-olive-light">
                    <span class="font-display text-6xl font-bold text-olive">01</span>
                </div>
                <span class="eyebrow">Visit our studio</span>
                <h3 class="mt-2 text-3xl font-bold">Studio Session</h3>
                <p class="mt-3 leading-7 text-muted">
                    Datang ke studio dengan kamera, lampu, dan backdrop yang sudah siap.
                    Kamu mengatur pose dan mengambil foto sendiri.
                </p>
                <a href="{{ route('register') }}" class="mt-6 inline-flex font-semibold text-olive-dark">
                    Kenali layanan ↗
                </a>
            </article>

            <article class="editorial-card overflow-hidden p-7 md:p-9">
                <div class="mb-8 flex h-44 items-center justify-center rounded-2xl bg-[#f4e2dc]">
                    <span class="font-display text-6xl font-bold text-accent">02</span>
                </div>
                <span class="eyebrow">We come to you</span>
                <h3 class="mt-2 text-3xl font-bold">On-Demand</h3>
                <p class="mt-3 leading-7 text-muted">
                    Tim kami membawa dan memasang perlengkapan self photo di lokasimu.
                    Kamu tetap menjadi fotografer untuk dirimu sendiri.
                </p>
                <a href="{{ route('register') }}" class="mt-6 inline-flex font-semibold text-olive-dark">
                    Kenali layanan ↗
                </a>
            </article>
        </div>
    </div>
</section>

<section id="tentang" class="site-container py-20 text-center">
    <span class="eyebrow">Make it memorable</span>
    <h2 class="mx-auto mt-4 max-w-2xl text-4xl font-bold md:text-5xl">
        The best photos happen when you're being yourself.
    </h2>
    <p class="mx-auto mt-5 max-w-xl leading-7 text-muted">
        Bebas berekspresi, bebas bereksperimen, dan bawa pulang kenangan
        yang benar-benar terasa seperti dirimu.
    </p>
</section>

@endsection
