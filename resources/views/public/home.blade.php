<x-public.layout title="Главная" description="Официальный сайт депутата Дмитрия Путилина: обращения граждан, новости округа, блог и контакты приёмной.">
    <!-- Hero -->
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8 lg:py-20">
            <div class="flex flex-col justify-center">
                <p class="inline-flex w-fit rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-900">Официальный сайт депутата</p>
                <h1 class="mt-6 max-w-4xl text-4xl font-semibold tracking-tight text-slate-950 sm:text-6xl">Дмитрий Владимирович Путилин</h1>
                <p class="mt-5 max-w-2xl text-xl leading-8 text-slate-600">Открытая приёмная, новости округа и понятный путь для обращения жителей.</p>
                <div class="mt-8 grid gap-3 sm:flex">
                    <a href="#appeal" class="rounded-xl bg-blue-900 px-6 py-3.5 text-center font-semibold text-white shadow-sm transition hover:bg-blue-800">Написать обращение</a>
                    <a href="{{ route('contacts') }}" class="rounded-xl border border-slate-300 bg-white px-6 py-3.5 text-center font-semibold text-slate-900 transition hover:border-blue-200 hover:bg-blue-50">График приёма</a>
                </div>
                <dl class="mt-10 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <dt class="text-sm text-slate-500">Приёмная</dt>
                        <dd class="mt-1 text-2xl font-semibold text-slate-950">онлайн</dd>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <dt class="text-sm text-slate-500">Темы</dt>
                        <dd class="mt-1 text-2xl font-semibold text-slate-950">ЖКХ · дороги</dd>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <dt class="text-sm text-slate-500">Ответы</dt>
                        <dd class="mt-1 text-2xl font-semibold text-slate-950">под контролем</dd>
                    </div>
                </dl>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-6">
                <div class="flex min-h-[440px] flex-col justify-between rounded-[1.5rem] bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-5">
                        <div>
                            <p class="text-sm font-semibold text-slate-950">Быстрые действия</p>
                            <p class="text-sm text-slate-500">Что можно сделать на сайте</p>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">доступно 24/7</span>
                    </div>
                    <div class="grid gap-3 py-6">
                        @foreach ([['01', 'Отправить обращение', 'Опишите проблему, приложите контакты и тему вопроса.'], ['02', 'Посмотреть новости', 'Читайте публикации о встречах, объектах и решениях.'], ['03', 'Найти контакты', 'Адрес, телефон, почта и расписание общественной приёмной.']] as [$number, $title, $text])
                            <div class="flex gap-4 rounded-2xl border border-slate-200 p-4">
                                <span class="grid size-10 shrink-0 place-items-center rounded-full bg-blue-900 text-sm font-semibold text-white">{{ $number }}</span>
                                <div>
                                    <p class="font-semibold text-slate-950">{{ $title }}</p>
                                    <p class="mt-1 text-sm leading-6 text-slate-600">{{ $text }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="rounded-2xl bg-blue-50 p-4 text-sm leading-6 text-blue-950">Если вопрос требует личного приёма, укажите это в обращении — сотрудники приёмной свяжутся с вами для согласования времени.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Сервисные разделы -->
    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-4">
            @foreach ([['Обращения', 'Передать вопрос в работу', '#appeal'], ['Новости', 'Что происходит в округе', route('news')], ['Блог', 'Позиция и разъяснения', route('blog')], ['Контакты', 'Как связаться с приёмной', route('contacts')]] as [$title, $text, $href])
                <a href="{{ $href }}" class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-md">
                    <p class="font-semibold text-slate-950">{{ $title }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $text }}</p>
                    <span class="mt-4 inline-flex text-sm font-semibold text-blue-900 group-hover:text-blue-700">Перейти →</span>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Новости -->
    <section class="mx-auto max-w-7xl px-4 pb-14 sm:px-6 lg:px-8">
        <div class="mb-8 flex items-end justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-blue-800">Новости</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Последние материалы</h2>
            </div>
            <a href="{{ route('news') }}" class="hidden rounded-xl border border-slate-300 px-5 py-3 font-semibold text-slate-900 hover:border-blue-200 hover:bg-blue-50 md:inline-flex">Все новости</a>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($latestNews as $post)
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <div class="h-2 bg-blue-900"></div>
                    <div class="p-6">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">{{ $post->published_at?->format('d.m.Y') }} · {{ $post->category }}</p>
                        <h3 class="mt-4 text-xl font-semibold text-slate-950">{{ $post->title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                        <a href="{{ route('news.show', $post) }}" class="mt-5 inline-flex font-semibold text-blue-900 hover:text-blue-700">Читать</a>
                    </div>
                </article>
            @empty
                @foreach(['Встречи с жителями', 'Благоустройство дворов', 'Контроль обращений'] as $title)
                    <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Скоро</p>
                        <h3 class="mt-3 text-xl font-semibold text-slate-950">{{ $title }}</h3>
                        <p class="mt-3 text-slate-600">После публикации материалы появятся в этом блоке автоматически.</p>
                    </article>
                @endforeach
            @endforelse
        </div>
    </section>

    <!-- Решённые вопросы -->
    <section class="bg-white py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-blue-800">На контроле</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Работы и выполненные задачи</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-5">
                @foreach ([['Благоустройство','15.07.2026'],['Дороги','18.07.2026'],['Освещение','22.07.2026'],['ЖКХ','25.07.2026'],['Детские площадки','30.07.2026']] as [$title,$date])
                    <article class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Завершено</span>
                        <h3 class="mt-4 font-semibold text-slate-950">{{ $title }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ $date }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- О депутате -->
    <section class="mx-auto grid max-w-7xl gap-8 px-4 py-14 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="aspect-[4/5] rounded-xl bg-slate-100"></div>
            <p class="mt-4 text-sm text-slate-500">Место для официальной фотографии</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-blue-800">О депутате</p>
            <h2 class="mt-3 text-3xl font-semibold text-slate-950 sm:text-4xl">Дмитрий Владимирович Путилин</h2>
            <div class="mt-6 grid gap-5 text-slate-600 md:grid-cols-3">
                <p><strong class="block text-slate-950">Биография</strong>Открытая работа с жителями и решение вопросов округа.</p>
                <p><strong class="block text-slate-950">Образование</strong>Профильное образование и постоянное повышение квалификации.</p>
                <p><strong class="block text-slate-950">Деятельность</strong>Контроль обращений, встречи, развитие инфраструктуры.</p>
            </div>
            <a href="{{ route('about') }}" class="mt-8 inline-flex rounded-xl border border-slate-300 px-6 py-3 font-semibold text-slate-900 hover:border-blue-200 hover:bg-blue-50">Подробнее</a>
        </div>
    </section>

    <!-- Форма обращения -->
    <section id="appeal" class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <livewire:appeal-form />
    </section>

    <!-- Контакты -->
    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-6 rounded-2xl border border-slate-200 bg-white p-8 shadow-sm md:grid-cols-4">
            <div>
                <p class="text-slate-500">Адрес</p>
                <p class="mt-2 font-semibold text-slate-950">Общественная приёмная округа</p>
            </div>
            <div>
                <p class="text-slate-500">Телефон</p>
                <p class="mt-2 font-semibold text-slate-950">+7 (000) 000-00-00</p>
            </div>
            <div>
                <p class="text-slate-500">Email</p>
                <p class="mt-2 font-semibold text-slate-950">reception@example.ru</p>
            </div>
            <div>
                <p class="text-slate-500">График</p>
                <p class="mt-2 font-semibold text-slate-950">Пн–Пт, 10:00–18:00</p>
            </div>
        </div>
    </section>
</x-public.layout>
