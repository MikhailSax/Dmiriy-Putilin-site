<x-public.layout title="Главная" description="Официальный сайт депутата Дмитрия Путилина: быстрые обращения жителей, новости округа и контакты приёмной.">
    <section class="relative isolate overflow-hidden bg-[#f8fbff]">
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute left-1/2 top-0 h-[38rem] w-[38rem] -translate-x-1/2 rounded-full bg-blue-200/30 blur-3xl animate-pulse-slow"></div>
            <div class="absolute right-[-8rem] top-28 h-80 w-80 rounded-full bg-cyan-200/35 blur-3xl animate-float"></div>
            <div class="absolute bottom-0 left-[-8rem] h-96 w-96 rounded-full bg-indigo-200/30 blur-3xl animate-float-delayed"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(15,23,42,0.08)_1px,transparent_0)] [background-size:34px_34px]"></div>
        </div>

        <div class="mx-auto grid min-h-[calc(100vh-5rem)] max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8 lg:py-20">
            <div class="animate-rise">
                <p class="inline-flex rounded-full border border-white/70 bg-white/70 px-4 py-2 text-sm font-semibold text-blue-950 shadow-sm backdrop-blur">Официальная приёмная</p>
                <h1 class="mt-6 max-w-4xl text-5xl font-semibold tracking-[-0.05em] text-slate-950 sm:text-7xl">Дмитрий Путилин</h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600 sm:text-xl">Минимум бюрократии: отправьте обращение, следите за новостями и находите контакты приёмной в пару кликов.</p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="#appeal" class="group rounded-full bg-slate-950 px-7 py-4 text-center font-semibold text-white shadow-xl shadow-slate-950/10 transition hover:-translate-y-1 hover:bg-blue-950">
                        Написать обращение <span class="inline-block transition group-hover:translate-x-1">→</span>
                    </a>
                    <a href="{{ route('contacts') }}" class="rounded-full border border-slate-200 bg-white/70 px-7 py-4 text-center font-semibold text-slate-900 shadow-sm backdrop-blur transition hover:-translate-y-1 hover:border-blue-200 hover:bg-white">Контакты</a>
                </div>
            </div>

            <div class="relative animate-rise animation-delay-200">
                <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-blue-500/20 via-cyan-300/20 to-white blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border border-white/70 bg-white/75 p-5 shadow-2xl shadow-blue-950/10 backdrop-blur-xl">
                    <div class="rounded-[1.5rem] bg-slate-950 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-white/60">Статус</span>
                            <span class="flex items-center gap-2 rounded-full bg-emerald-400/15 px-3 py-1 text-xs font-semibold text-emerald-200"><span class="size-2 rounded-full bg-emerald-300 animate-ping-soft"></span>онлайн</span>
                        </div>
                        <p class="mt-16 text-3xl font-semibold tracking-tight">Ваш вопрос будет принят и направлен в работу.</p>
                        <div class="mt-8 grid gap-3">
                            @foreach ([['01', 'Обращение'], ['02', 'Проверка'], ['03', 'Ответ']] as [$number, $title])
                                <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/10 p-4">
                                    <span class="text-white/50">{{ $number }}</span>
                                    <span class="font-semibold">{{ $title }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-4">
            @foreach ([['Обращения', '#appeal'], ['Новости', route('news')], ['Блог', route('blog')], ['Контакты', route('contacts')]] as [$title, $href])
                <a href="{{ $href }}" class="group rounded-[1.5rem] border border-slate-200 bg-white/80 p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-950/5">
                    <span class="text-lg font-semibold text-slate-950">{{ $title }}</span>
                    <span class="mt-4 flex size-10 items-center justify-center rounded-full bg-slate-100 text-slate-900 transition group-hover:bg-blue-950 group-hover:text-white">→</span>
                </a>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
        <div class="mb-7 flex items-center justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-blue-800">Новости</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Коротко о важном</h2>
            </div>
            <a href="{{ route('news') }}" class="hidden rounded-full border border-slate-200 bg-white px-5 py-3 font-semibold text-slate-900 transition hover:border-blue-200 hover:bg-blue-50 md:inline-flex">Все новости</a>
        </div>

        <div class="grid gap-5 md:grid-cols-3">
            @forelse($latestNews as $post)
                <article class="group rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-950/5">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">{{ $post->published_at?->format('d.m.Y') }} · {{ $post->category }}</p>
                    <h3 class="mt-4 text-xl font-semibold text-slate-950">{{ $post->title }}</h3>
                    <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                    <a href="{{ route('news.show', $post) }}" class="mt-5 inline-flex font-semibold text-blue-900 transition group-hover:translate-x-1">Читать →</a>
                </article>
            @empty
                @foreach(['Встречи с жителями', 'Благоустройство', 'Контроль обращений'] as $title)
                    <article class="rounded-[1.5rem] border border-dashed border-slate-300 bg-white/70 p-6">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Скоро</p>
                        <h3 class="mt-3 text-xl font-semibold text-slate-950">{{ $title }}</h3>
                    </article>
                @endforeach
            @endforelse
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-6 px-4 pb-12 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="grid aspect-[4/3] place-items-center rounded-[1.5rem] bg-gradient-to-br from-slate-100 to-blue-100 text-slate-400">
                <span class="text-sm font-semibold">Фото</span>
            </div>
        </div>
        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-blue-800">О депутате</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Открытая работа с жителями</h2>
            <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">Сайт сфокусирован на главном: обращениях, актуальных новостях и быстрых способах связи с общественной приёмной.</p>
            <a href="{{ route('about') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 font-semibold text-white transition hover:-translate-y-1 hover:bg-blue-950">Подробнее</a>
        </div>
    </section>

    <section id="appeal" class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <livewire:appeal-form />
    </section>
</x-public.layout>
