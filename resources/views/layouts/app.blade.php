<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Self Photo Studio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">

    <header class="sticky top-0 z-50 border-b border-line bg-paper/95 backdrop-blur">
        <nav class="site-container flex min-h-[76px] items-center justify-between">
            <a href="{{ route('home') }}" class="font-display text-2xl font-bold tracking-tight">
                self<span class="text-olive">.</span>studio
            </a>

            <button data-menu-toggle class="rounded-full border border-line px-4 py-2 text-sm md:hidden">
                Menu
            </button>

            <div data-menu class="hidden absolute left-0 right-0 top-[76px] border-b border-line bg-paper p-5 md:static md:flex md:items-center md:gap-8 md:border-0 md:bg-transparent md:p-0">
                <a href="{{ route('home') }}" class="block py-2 text-sm font-medium hover:text-olive">Beranda</a>
                <a href="#layanan" class="block py-2 text-sm font-medium hover:text-olive">Layanan</a>
                <a href="#tentang" class="block py-2 text-sm font-medium hover:text-olive">Tentang Kami</a>

                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 text-sm font-semibold text-olive">Dashboard Admin</a>
                    @endif

                    <span class="block py-2 text-sm">Hai, {{ auth()->user()->name }}</span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn-primary mt-2 md:mt-0">Keluar</button>
                    </form>
                @else
                    <div class="flex flex-col gap-3 pt-3 md:flex-row md:pt-0">
                        <a href="{{ route('login') }}" class="btn-outline">Masuk</a>
                        <a href="{{ route('register') }}" class="btn-primary">Daftar Sekarang ↗</a>
                    </div>
                @endauth
            </div>
        </nav>
    </header>

    @if(session('success'))
        <div class="site-container mt-5 rounded-xl border border-olive/20 bg-olive-light px-5 py-3 text-sm text-olive-dark">
            {{ session('success') }}
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="mt-20 border-t border-line bg-surface">
        <div class="site-container flex flex-col justify-between gap-5 py-10 md:flex-row md:items-center">
            <div>
                <p class="font-display text-xl font-bold">self<span class="text-olive">.</span>studio</p>
                <p class="mt-1 text-sm text-muted">Your moment. Your camera. Your story.</p>
            </div>
            <p class="text-sm text-muted">© {{ date('Y') }} Self Photo Studio. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
