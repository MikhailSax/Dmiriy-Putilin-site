<x-public.layout title="Главная" description="Официальный информационный портал депутата Народного Хурала Республики Бурятия Дмитрия Путилина.">
    <section class="mx-auto max-w-7xl px-4 pt-8 sm:px-6 lg:px-8">
        <div class="grid overflow-hidden rounded-[2rem] border border-slate-200 bg-gradient-to-br from-white via-blue-50 to-slate-200 shadow-sm lg:grid-cols-[1.05fr_0.95fr]">
            <div class="px-6 py-16 sm:px-10 lg:px-14 lg:py-24">
                <h1 class="max-w-3xl text-5xl font-bold leading-[0.98] tracking-[-0.06em] text-blue-950 sm:text-6xl lg:text-7xl">Работаю для жителей<br>и развития региона</h1>
                <p class="mt-7 max-w-xl text-lg leading-8 text-slate-700">Официальный информационный портал депутата Народного Хурала Республики Бурятия Дмитрия Путилина.</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row"><a href="{{ route('appeals') }}#appeal-form" class="btn-primary">Направить обращение →</a><a href="{{ route('about') }}" class="btn-secondary">Подробнее обо мне</a></div>
            </div>
            <div class="portrait-card min-h-[360px] lg:min-h-[560px]"><div class="absolute inset-x-8 bottom-8 z-20 rounded-3xl bg-white/75 p-5 backdrop-blur"><p class="font-bold text-blue-950">Дмитрий Путилин</p><p class="mt-1 text-sm text-slate-600">Депутат Народного Хурала Республики Бурятия</p></div></div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-8 px-4 py-14 sm:px-6 lg:grid-cols-[1fr_360px] lg:px-8">
        <div>
            <div class="mb-7 flex items-end justify-between"><h2 class="section-title">Новости</h2><a class="hidden text-sm font-bold text-blue-800 md:inline" href="{{ route('news') }}">Все новости →</a></div>
            <div class="grid gap-5 md:grid-cols-3">
                @forelse($latestNews as $post)
                    <article class="card group overflow-hidden transition hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-950/5">
                        <div class="h-44 bg-gradient-to-br from-slate-200 to-blue-100"></div>
                        <div class="p-5"><p class="text-xs text-slate-500">{{ $post->published_at?->translatedFormat('j F Y') }}</p><h3 class="mt-3 font-bold leading-6 text-slate-950">{{ $post->title }}</h3><p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p><a href="{{ route('news.show', $post) }}" class="mt-4 inline-flex text-sm font-bold text-blue-800">Читать далее →</a></div>
                    </article>
                @empty
                    @foreach(['Встреча с жителями Железнодорожного района','Рабочее совещание по вопросам дорожной инфраструктуры','Принял участие в заседании Народного Хурала'] as $title)
                        <article class="card overflow-hidden"><div class="h-44 bg-gradient-to-br from-slate-200 to-blue-100"></div><div class="p-5"><p class="text-xs text-slate-500">11 августа 2026</p><h3 class="mt-3 font-bold leading-6">{{ $title }}</h3><p class="mt-3 text-sm leading-6 text-slate-600">Краткая информация о событии и дальнейшей работе.</p><span class="mt-4 inline-flex text-sm font-bold text-blue-800">Читать далее →</span></div></article>
                    @endforeach
                @endforelse
            </div>
        </div>
        <aside class="card bg-blue-50/70 p-8"><h2 class="text-2xl font-bold">Обращения граждан</h2><p class="mt-4 text-sm leading-6 text-slate-700">Если у вас есть вопрос или проблема — направьте обращение. Все обращения рассматриваются в установленном порядке.</p><a href="{{ route('appeals') }}#appeal-form" class="btn-primary mt-7">Направить обращение →</a><div class="mt-8 grid gap-3 text-sm"><a href="{{ route('appeals') }}" class="rounded-2xl bg-white p-4">Как подать обращение</a><a href="{{ route('appeals') }}" class="rounded-2xl bg-white p-4">Способы обращения</a><a href="{{ route('appeals') }}" class="rounded-2xl bg-white p-4">Часто задаваемые вопросы</a></div></aside>
    </section>

    <section class="mx-auto grid max-w-7xl gap-6 px-4 pb-8 sm:px-6 lg:grid-cols-2 lg:px-8">
        <a href="{{ route('about') }}" class="card group overflow-hidden p-8 transition hover:-translate-y-1"><p class="eyebrow">О депутате</p><h2 class="mt-4 text-2xl font-bold">Биография, опыт и приоритеты в работе</h2><p class="mt-4 text-slate-600">Кратко о профессиональном пути, общественной деятельности и текущей работе.</p><span class="mt-6 inline-flex font-bold text-blue-800">Подробнее →</span></a>
        <a href="{{ route('activity') }}" class="card group overflow-hidden p-8 transition hover:-translate-y-1"><p class="eyebrow">Деятельность</p><h2 class="mt-4 text-2xl font-bold">Законодательная работа и встречи с жителями</h2><p class="mt-4 text-slate-600">Основные направления деятельности депутата без перегруженных показателей и дашбордов.</p><span class="mt-6 inline-flex font-bold text-blue-800">Подробнее →</span></a>
    </section>
</x-public.layout>
