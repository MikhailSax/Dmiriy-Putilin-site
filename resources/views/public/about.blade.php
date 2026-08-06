<x-public.layout title="О депутате">
    <section class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        <p class="text-sm font-medium uppercase tracking-[0.3em] text-blue-700">О депутате</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight">Дмитрий Владимирович Путилин</h1>
        <p class="mt-6 text-lg leading-8 text-slate-600">Раздел с биографией, направлениями работы, приоритетами округа и принципами открытой коммуникации с жителями.</p>
        <div class="mt-10 grid gap-4 md:grid-cols-2">
            @foreach (['Открытый диалог с жителями', 'Контроль исполнения заявок', 'Поддержка локальных инициатив', 'Публичные отчёты о работе'] as $item)
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1">{{ $item }}</div>
            @endforeach
        </div>
    </section>
</x-public.layout>
