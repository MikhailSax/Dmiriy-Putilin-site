@props(['title' => 'Администрирование'])
<!DOCTYPE html>
<html lang="ru">
<head>
    @include('partials.head', ['title' => $title ?? 'Администрирование'])
</head>
<body class="bg-slate-100 text-slate-950">
    <div class="min-h-screen lg:flex">
        <aside class="border-r border-slate-200 bg-blue-950 p-6 text-white lg:w-72">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold">Админ-панель</a>
            <nav class="mt-8 grid gap-2 text-sm">
                <a class="rounded-2xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="rounded-2xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.news') }}">Новости</a>
                <a class="rounded-2xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.blog') }}">Блог</a>
                <a class="rounded-2xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.appeals') }}">Обращения</a>
                <a class="rounded-2xl px-4 py-3 hover:bg-white/10" href="{{ route('home') }}">На сайт</a>
            </nav>
        </aside>
        <main class="flex-1 p-4 lg:p-8">{{ $slot }}</main>
    </div>
    @fluxScripts
</body>
</html>
