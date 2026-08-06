<!DOCTYPE html>
<html lang="ru">
<head>
    @include('partials.head', ['title' => $title ?? 'Депутат Дмитрий Путилин'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute left-1/2 top-0 h-80 w-80 -translate-x-1/2 rounded-full bg-blue-200/40 blur-3xl"></div>
        <div class="absolute bottom-20 right-10 h-64 w-64 rounded-full bg-amber-100/70 blur-3xl"></div>
    </div>

    <header class="sticky top-0 z-50 border-b border-white/70 bg-white/80 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="group flex items-center gap-3">
                <span class="grid size-11 place-items-center rounded-2xl bg-slate-950 text-sm font-bold text-white transition group-hover:scale-105">ДП</span>
                <span>
                    <span class="block text-sm font-semibold leading-5">Дмитрий Путилин</span>
                    <span class="block text-xs text-slate-500">приёмная депутата</span>
                </span>
            </a>
            <div class="hidden items-center gap-6 text-sm font-medium text-slate-600 md:flex">
                <a class="transition hover:text-blue-700" href="{{ route('home') }}">Главная</a>
                <a class="transition hover:text-blue-700" href="{{ route('about') }}">О депутате</a>
                <a class="transition hover:text-blue-700" href="{{ route('news') }}">Новости</a>
                <a class="transition hover:text-blue-700" href="{{ route('blog') }}">Блог</a>
                <a class="transition hover:text-blue-700" href="{{ route('contacts') }}">Контакты</a>
            </div>
            <a href="{{ route('contacts') }}#appeal" class="rounded-full bg-blue-700 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-700/20 transition hover:-translate-y-0.5 hover:bg-blue-800">Обратиться</a>
        </nav>
    </header>

    <main>{{ $slot }}</main>

    <footer class="mt-20 border-t border-slate-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
                <p class="font-semibold">Общественная приёмная Дмитрия Владимировича Путилина</p>
                <p class="mt-3 text-sm text-slate-500">Сайт для обращений жителей, публикации новостей округа и отчётов о депутатской работе.</p>
            </div>
            <div class="text-sm text-slate-600">
                <p class="font-semibold text-slate-900">Навигация</p>
                <div class="mt-3 grid gap-2">
                    <a href="{{ route('news') }}">Новости округа</a>
                    <a href="{{ route('blog') }}">Блог и отчёты</a>
                    <a href="{{ route('contacts') }}">Контакты</a>
                </div>
            </div>
            <div class="text-sm text-slate-600">
                <p class="font-semibold text-slate-900">Социальные сети</p>
                <div class="mt-3 flex gap-3">
                    <a class="rounded-full border border-slate-200 px-4 py-2 transition hover:border-blue-300 hover:text-blue-700" href="#">VK</a>
                    <a class="rounded-full border border-slate-200 px-4 py-2 transition hover:border-blue-300 hover:text-blue-700" href="#">Telegram</a>
                    <a class="rounded-full border border-slate-200 px-4 py-2 transition hover:border-blue-300 hover:text-blue-700" href="#">OK</a>
                </div>
                <p class="mt-4 text-xs text-slate-400">© {{ date('Y') }} Приёмная депутата</p>
            </div>
        </div>
    </footer>
    @fluxScripts
</body>
</html>
