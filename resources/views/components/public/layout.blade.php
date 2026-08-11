@props(['title' => 'Депутат Дмитрий Путилин', 'description' => null])
<!DOCTYPE html>
<html lang="ru" class="scroll-smooth">
<head>
    @include('partials.head', ['title' => $title ?? 'Депутат Дмитрий Путилин'])
    <meta name="description" content="{{ $description ?? 'Официальный информационный портал депутата Народного Хурала Республики Бурятия Дмитрия Путилина.' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Депутат Дмитрий Путилин' }}">
    <meta property="og:description" content="{{ $description ?? 'Новости, деятельность, обращения граждан и контакты приёмной.' }}">
</head>
<body class="min-h-screen bg-[#f6f8fb] font-sans text-slate-950 antialiased">
    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="group flex items-center gap-4">
                <span class="text-3xl font-black tracking-[-0.08em] text-blue-950">ДП</span>
                <span class="hidden sm:block">
                    <span class="block text-sm font-bold leading-5">Дмитрий Путилин</span>
                    <span class="block max-w-44 text-xs leading-4 text-slate-500">Депутат Народного Хурала Республики Бурятия</span>
                </span>
            </a>

            <div class="hidden items-center gap-7 text-sm font-semibold text-slate-700 lg:flex">
                <a class="nav-link" href="{{ route('home') }}">Главная</a>
                <a class="nav-link" href="{{ route('news') }}">Новости</a>
                <a class="nav-link" href="{{ route('blog') }}">Блог</a>
                <a class="nav-link" href="{{ route('about') }}">О депутате</a>
                <a class="nav-link" href="{{ route('activity') }}">Деятельность</a>
                <a class="nav-link" href="{{ route('appeals') }}">Обращения</a>
                <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('appeals') }}#appeal-form" class="btn-primary hidden sm:inline-flex">Направить обращение</a>
                <details class="relative lg:hidden">
                    <summary class="grid size-11 cursor-pointer list-none place-items-center rounded-xl border border-slate-200 bg-white text-blue-950 shadow-sm">☰</summary>
                    <div class="absolute right-0 mt-3 w-72 rounded-3xl border border-slate-200 bg-white p-3 shadow-2xl shadow-blue-950/10">
                        @foreach ([['Главная', route('home')], ['Новости', route('news')], ['Блог', route('blog')], ['О депутате', route('about')], ['Деятельность', route('activity')], ['Обращения', route('appeals')], ['Контакты', route('contacts')]] as [$label, $href])
                            <a class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-950" href="{{ $href }}">{{ $label }}</a>
                        @endforeach
                    </div>
                </details>
            </div>
        </nav>
    </header>

    <main>{{ $slot }}</main>

    <footer class="mt-20 bg-blue-950 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 md:grid-cols-[1.2fr_1fr_1fr_1fr] lg:px-8">
            <div>
                <div class="flex items-center gap-4"><span class="text-3xl font-black tracking-[-0.08em]">ДП</span><div><p class="font-bold">Дмитрий Путилин</p><p class="text-sm text-blue-100/70">Депутат Народного Хурала Республики Бурятия</p></div></div>
                <p class="mt-6 text-sm leading-6 text-blue-100/70">Официальный информационный портал о работе депутата, деятельности и способах обращения граждан.</p>
            </div>
            <div><p class="font-semibold">Навигация</p><div class="mt-4 grid gap-2 text-sm text-blue-100/70"><a href="{{ route('news') }}">Новости</a><a href="{{ route('blog') }}">Блог</a><a href="{{ route('activity') }}">Деятельность</a><a href="{{ route('appeals') }}">Обращения</a></div></div>
            <div><p class="font-semibold">Контакты</p><div class="mt-4 grid gap-2 text-sm text-blue-100/70"><span>+7 (3012) 21-23-24</span><span>deputat@putilin.ru</span><span>Улан-Удэ, ул. Ленина, 54</span></div></div>
            <div><p class="font-semibold">Социальные сети</p><div class="mt-4 flex gap-2"><a class="social" href="#">TG</a><a class="social" href="#">VK</a><a class="social" href="#">OK</a></div></div>
        </div>
        <div class="mx-auto flex max-w-7xl flex-col gap-3 border-t border-white/10 px-4 py-5 text-xs text-blue-100/60 sm:flex-row sm:justify-between sm:px-6 lg:px-8"><span>© {{ date('Y') }} Дмитрий Путилин</span><span>Политика конфиденциальности · Согласие на обработку персональных данных</span></div>
    </footer>
    @fluxScripts
</body>
</html>
