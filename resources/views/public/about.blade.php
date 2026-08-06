<x-public.layout title="О депутате" description="Биография, образование, опыт работы и деятельность депутата Дмитрия Путилина.">
    <section class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[420px_1fr] lg:px-8">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-950 to-red-800 p-6">
            <div class="aspect-[3/4] rounded-[2rem] bg-white/15"></div>
        </div>
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-red-600">О депутате</p>
            <h1 class="mt-4 text-5xl font-semibold tracking-tight">Дмитрий Владимирович Путилин</h1>
            <p class="mt-6 text-lg leading-8 text-slate-600">Раздел для официальной биографии, сведений об образовании, профессиональном опыте, общественной деятельности и приоритетах работы в округе.</p>
            <div class="mt-10 grid gap-4 md:grid-cols-2">
                @foreach (['Биография и общественная работа', 'Образование и компетенции', 'Опыт решения вопросов жителей', 'Деятельность и приоритеты округа'] as $item)
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">{{ $item }}</div>
                @endforeach
            </div>
        </div>
    </section>
</x-public.layout>
