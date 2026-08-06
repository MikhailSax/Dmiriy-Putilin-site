<x-public.layout title="Блог">
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-medium uppercase tracking-[0.3em] text-blue-700">Блог депутата</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight">Позиции, планы и отчёты</h1>
        <div class="mt-10 grid gap-5 lg:grid-cols-2">
            @foreach ([['Как формируется карта обращений', 'Объясняем путь заявки от формы на сайте до контроля исполнения.'], ['Приоритеты развития округа', 'Благоустройство, безопасность, социальная инфраструктура и транспорт.']] as [$title, $text])
                <article class="rounded-[2rem] border border-slate-200 bg-white p-8 transition hover:-translate-y-1 hover:shadow-lg">
                    <h2 class="text-2xl font-semibold">{{ $title }}</h2>
                    <p class="mt-4 text-slate-600">{{ $text }}</p>
                </article>
            @endforeach
        </div>
    </section>
</x-public.layout>
