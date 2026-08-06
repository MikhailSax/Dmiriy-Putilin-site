<x-public.layout title="Главная">
    <section class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8 lg:py-24">
        <div class="animate-[fade-in_0.7s_ease-out]">
            <p class="inline-flex rounded-full border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-800">Приёмная депутата округа</p>
            <h1 class="mt-6 text-4xl font-semibold tracking-tight text-slate-950 sm:text-6xl">Сайт для обращений к Дмитрию Владимировичу Путилину</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">Принимаем заявки жителей, публикуем новости округа, ведём блог о работе депутата и собираем предложения по развитию территории.</p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="#appeal" class="rounded-2xl bg-slate-950 px-6 py-4 text-center text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700">Оставить заявку</a>
                <a href="{{ route('news') }}" class="rounded-2xl border border-slate-200 bg-white px-6 py-4 text-center text-sm font-semibold text-slate-800 transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700">Последние новости</a>
            </div>
        </div>
        <div class="rounded-[2rem] border border-white bg-white/70 p-4 shadow-xl shadow-slate-200/70 backdrop-blur">
            <div class="rounded-[1.5rem] bg-slate-950 p-6 text-white">
                <p class="text-sm uppercase tracking-[0.3em] text-blue-200">Новости округа</p>
                <h2 class="mt-4 text-2xl font-semibold">Обновление дворовых территорий и общественных пространств</h2>
                <p class="mt-4 text-slate-300">Короткий баннер с главными публикациями: благоустройство, встречи с жителями, отчёты по обращениям.</p>
            </div>
            <div class="mt-4 grid gap-3 sm:grid-cols-3">
                @foreach ([['124', 'обращения в работе'], ['18', 'новостей за месяц'], ['7', 'встреч с жителями']] as [$value, $label])
                    <div class="rounded-3xl bg-white p-5 shadow-sm">
                        <p class="text-3xl font-semibold text-slate-950">{{ $value }}</p>
                        <p class="mt-1 text-sm text-slate-500">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ([['Приём заявок', 'Фиксируем вопросы ЖКХ, транспорта, благоустройства и социальной поддержки.'], ['Блог депутата', 'Публикуем позиции, планы и подробные отчёты о решениях.'], ['Новости округа', 'Рассказываем о событиях, встречах и результатах по обращениям.']] as [$title, $text])
                <article class="rounded-[2rem] border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/70">
                    <h3 class="text-xl font-semibold">{{ $title }}</h3>
                    <p class="mt-3 text-slate-600">{{ $text }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section id="appeal" class="mx-auto mt-16 max-w-4xl px-4 sm:px-6 lg:px-8">
        <livewire:appeal-form />
    </section>
</x-public.layout>
