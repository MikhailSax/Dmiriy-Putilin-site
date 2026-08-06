<x-public.layout title="Новости">
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-medium uppercase tracking-[0.3em] text-blue-700">Новости округа</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight">Последние события и результаты</h1>
        <div class="mt-10 grid gap-5 md:grid-cols-3">
            @foreach ([['Благоустройство', 'Стартовал сбор предложений по дворовым территориям.'], ['Встреча', 'Жители обсудили вопросы транспорта и освещения.'], ['Отчёт', 'Подведены итоги обработки обращений за неделю.']] as [$tag, $text])
                <article class="rounded-[2rem] border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg">
                    <span class="text-sm font-semibold text-blue-700">{{ $tag }}</span>
                    <h2 class="mt-4 text-xl font-semibold">{{ $text }}</h2>
                    <p class="mt-4 text-sm text-slate-500">Материал можно подключить к будущей админ-панели или модели новостей.</p>
                </article>
            @endforeach
        </div>
    </section>
</x-public.layout>
