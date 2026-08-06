<x-public.layout :title="$post->seo_title ?: $post->title" :description="$post->seo_description ?: $post->excerpt">
    <article class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="h-96 rounded-[2.5rem] bg-gradient-to-br from-blue-950 via-blue-800 to-red-700"></div>
        <p class="mt-8 text-sm font-semibold uppercase tracking-[0.25em] text-red-600">{{ $post->category }} · {{ $post->published_at?->format('d.m.Y') }}</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight">{{ $post->title }}</h1>
        <p class="mt-6 text-xl leading-9 text-slate-600">{{ $post->excerpt }}</p>
        <div class="prose prose-slate mt-10 max-w-none text-lg leading-9 text-slate-700">{!! nl2br(e($post->content)) !!}</div>
        <section class="mt-12"><h2 class="text-2xl font-semibold">Фотогалерея</h2><div class="mt-5 grid gap-4 md:grid-cols-3">@for($i=1;$i<=3;$i++)<div class="h-44 rounded-[2rem] bg-slate-200"></div>@endfor</div></section>
        @if(($related ?? collect())->isNotEmpty())<section class="mt-12"><h2 class="text-2xl font-semibold">Похожие материалы</h2><div class="mt-5 grid gap-4 md:grid-cols-3">@foreach($related as $item)<a href="{{ route(request()->routeIs('news.show') ? 'news.show' : 'blog.show', $item) }}" class="rounded-3xl border border-slate-200 bg-white p-5 transition hover:-translate-y-1"><p class="text-sm text-red-600">{{ $item->category }}</p><p class="mt-2 font-semibold">{{ $item->title }}</p></a>@endforeach</div></section>@endif
    </article>
</x-public.layout>
