<x-public.layout title="Новости" description="Новости округа, встречи с жителями и результаты работы депутата Дмитрия Путилина.">
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-600">Новости</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight">Новости округа</h1>
        <p class="mt-5 max-w-3xl text-lg text-slate-600">Последние события, встречи с жителями и результаты работы депутата Дмитрия Путилина.</p>
        
        <div class="mt-10">
            @if(isset($news) && $news->count())
                <livewire:public.news-index />
            @else
                <div class="grid gap-5 md:grid-cols-3">
                    @foreach ([
                        ['Благоустройство', 'Стартовал сбор предложений по дворовым территориям.', 'Жители могут предложить идеи по благоустройству своих дворов до конца месяца.'],
                        ['Встреча', 'Жители обсудили вопросы транспорта и освещения.', 'На встрече с депутатом были подняты вопросы транспортной доступности и уличного освещения.'],
                        ['Отчёт', 'Подведены итоги обработки обращений за неделю.', 'За прошедшую неделю обработано более 50 обращений от жителей округа.']
                    ] as [$tag, $title, $excerpt])
                        <article class="rounded-[2rem] border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg">
                            <span class="text-sm font-semibold text-blue-700">{{ $tag }}</span>
                            <h2 class="mt-4 text-xl font-semibold">{{ $title }}</h2>
                            <p class="mt-3 text-sm text-slate-600">{{ $excerpt }}</p>
                            <a href="#" class="mt-4 inline-flex font-semibold text-blue-950 hover:text-red-700">Читать →</a>
                        </article>
                    @endforeach
                </div>
                <p class="mt-8 text-center text-sm text-slate-500">Материалы появятся здесь после настройки административной панели.</p>
            @endif
        </div>
    </section>
</x-public.layout>