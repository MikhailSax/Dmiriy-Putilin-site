<x-public.layout title="Главная" description="Официальный сайт депутата Дмитрия Путилина: обращения граждан, новости округа, блог и контакты приёмной.">
    <section class="relative overflow-hidden bg-blue-950 text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(220,38,38,0.35),transparent_35%),linear-gradient(120deg,rgba(15,23,42,0.95),rgba(30,58,138,0.85))]"></div>
        <div class="relative mx-auto grid max-w-7xl items-center gap-10 px-4 py-20 sm:px-6 lg:grid-cols-[1fr_460px] lg:px-8 lg:py-28">
            <div class="animate-[fade-in_0.7s_ease-out]">
                <p class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium">Официальный сайт депутата</p>
                <h1 class="mt-6 text-5xl font-semibold tracking-tight sm:text-7xl">Дмитрий Владимирович Путилин</h1>
                <p class="mt-4 text-xl text-blue-100">Депутат, открытая приёмная и прямой диалог с жителями округа.</p>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-blue-100/90">Здесь можно направить обращение, узнать последние новости, прочитать отчёты о работе и найти контакты для личного приёма.</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="#appeal" class="rounded-2xl bg-red-700 px-7 py-4 text-center font-semibold text-white transition hover:-translate-y-0.5 hover:bg-red-600">Отправить обращение</a>
                    <a href="{{ route('news') }}" class="rounded-2xl border border-white/25 bg-white/10 px-7 py-4 text-center font-semibold text-white backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/20">Последние новости</a>
                </div>
            </div>
            <div class="rounded-[2.5rem] border border-white/20 bg-white/10 p-4 shadow-2xl backdrop-blur">
                <div class="aspect-[4/5] rounded-[2rem] bg-gradient-to-br from-slate-200 via-white to-blue-200 p-8 text-blue-950">
                    <div class="flex h-full flex-col justify-end rounded-[1.5rem] border border-blue-100 bg-white/70 p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-700">Фото депутата</p>
                        <p class="mt-3 text-3xl font-semibold">Дмитрий Путилин</p>
                        <p class="mt-2 text-slate-600">Место для официальной фотографии</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mb-8 flex items-end justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-600">Новости</p>
                <h2 class="mt-3 text-4xl font-semibold tracking-tight">Последние новости округа</h2>
            </div>
            <a href="{{ route('news') }}" class="hidden rounded-full border border-slate-200 px-5 py-3 font-semibold text-blue-950 hover:border-red-300 hover:text-red-700 md:inline-flex">Все новости</a>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            @forelse ($latestNews as $post)
                <article class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-gradient-to-br from-blue-950 to-red-700"></div>
                    <div class="p-6">
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-red-600">{{ $post->published_at?->format('d.m.Y') }} · {{ $post->category }}</p>
                        <h3 class="mt-4 text-xl font-semibold">{{ $post->title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                        <a href="{{ route('news.show', $post) }}" class="mt-5 inline-flex font-semibold text-blue-950 hover:text-red-700">Читать</a>
                    </div>
                </article>
            @empty
                @foreach (['Встречи с жителями', 'Благоустройство дворов', 'Контроль обращений'] as $title)
                    <article class="rounded-[2rem] border border-slate-200 bg-white p-6">
                        <div class="h-40 rounded-3xl bg-gradient-to-br from-blue-950 to-red-700"></div>
                        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.2em] text-red-600">Скоро</p>
                        <h3 class="mt-3 text-xl font-semibold">{{ $title }}</h3>
                        <p class="mt-3 text-slate-600">После публикации материалы появятся в этом блоке автоматически.</p>
                    </article>
                @endforeach
            @endforelse
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 rounded-[2.5rem] bg-white p-6 shadow-sm md:grid-cols-[1fr_320px] md:p-10">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-600">Общественная приёмная</p>
                <h2 class="mt-3 text-4xl font-semibold">Поможем зарегистрировать и проконтролировать вопрос</h2>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">Сообщите о проблеме во дворе, ЖКХ, освещении, дорогах, социальных вопросах или предложите инициативу для округа.</p>
            </div>
            <div class="flex items-center">
                <a href="#appeal" class="w-full rounded-2xl bg-blue-950 px-6 py-4 text-center font-semibold text-white transition hover:-translate-y-0.5 hover:bg-red-700">Отправить обращение</a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-600">Решённые вопросы</p>
        <h2 class="mt-3 text-4xl font-semibold tracking-tight">Работы на контроле и выполненные задачи</h2>
        <div class="mt-8 grid gap-5 md:grid-cols-5">
            @foreach ([['Благоустройство', '15.07.2026'], ['Дороги', '18.07.2026'], ['Освещение', '22.07.2026'], ['ЖКХ', '25.07.2026'], ['Детские площадки', '30.07.2026']] as [$title, $date])
                <article class="rounded-[2rem] border border-slate-200 bg-white p-5 transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-28 rounded-3xl bg-slate-200"></div>
                    <h3 class="mt-4 font-semibold">{{ $title }}</h3>
                    <p class="mt-2 text-sm text-slate-500">{{ $date }}</p>
                    <span class="mt-4 inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Завершено</span>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[380px_1fr] lg:px-8">
        <div class="rounded-[2rem] bg-gradient-to-br from-blue-950 to-red-800 p-6 text-white">
            <div class="aspect-[3/4] rounded-[1.5rem] bg-white/15"></div>
        </div>
        <div class="rounded-[2rem] border border-slate-200 bg-white p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-600">О депутате</p>
            <h2 class="mt-3 text-4xl font-semibold">Дмитрий Владимирович Путилин</h2>
            <div class="mt-6 grid gap-5 text-slate-600 md:grid-cols-3">
                <p><strong class="block text-slate-950">Биография</strong>Открытая работа с жителями и решение вопросов округа.</p>
                <p><strong class="block text-slate-950">Образование</strong>Профильное образование и постоянное повышение квалификации.</p>
                <p><strong class="block text-slate-950">Деятельность</strong>Контроль обращений, встречи, развитие инфраструктуры.</p>
            </div>
            <a href="{{ route('about') }}" class="mt-8 inline-flex rounded-2xl border border-slate-200 px-6 py-3 font-semibold text-blue-950 hover:border-red-300 hover:text-red-700">Подробнее</a>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-600">Галерея</p>
        <h2 class="mt-3 text-4xl font-semibold tracking-tight">Фотографии встреч и объектов</h2>
        <div class="mt-8 grid gap-4 md:grid-cols-4" x-data="{ image: null }">
            @for ($i = 1; $i <= 8; $i++)
                <button type="button" @click="image = 'Фото {{ $i }}'" class="h-44 rounded-[2rem] bg-gradient-to-br from-slate-200 to-blue-100 transition hover:-translate-y-1"></button>
            @endfor
            <div x-show="image" x-cloak @click="image = null" class="fixed inset-0 z-50 grid place-items-center bg-slate-950/80 p-6">
                <div class="w-full max-w-3xl rounded-[2rem] bg-white p-8 text-center text-2xl font-semibold" x-text="image"></div>
            </div>
        </div>
    </section>

    <section id="appeal" class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <livewire:appeal-form />
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-6 rounded-[2.5rem] bg-blue-950 p-8 text-white md:grid-cols-4">
            <div><p class="text-blue-200">Адрес</p><p class="mt-2 font-semibold">Общественная приёмная округа</p></div>
            <div><p class="text-blue-200">Телефон</p><p class="mt-2 font-semibold">+7 (000) 000-00-00</p></div>
            <div><p class="text-blue-200">Email</p><p class="mt-2 font-semibold">reception@example.ru</p></div>
            <div><p class="text-blue-200">График</p><p class="mt-2 font-semibold">Пн–Пт, 10:00–18:00</p></div>
        </div>
    </section>
</x-public.layout>
