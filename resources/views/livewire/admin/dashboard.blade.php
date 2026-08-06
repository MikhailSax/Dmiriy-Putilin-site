<div>
    <h1 class="text-4xl font-semibold tracking-tight">Dashboard</h1>
    <div class="mt-8 grid gap-4 md:grid-cols-3">
        @foreach ([['Новости', $newsCount], ['Публикации блога', $blogCount], ['Обращения', $appealsCount]] as [$label, $value])
            <div class="rounded-[2rem] bg-white p-6 shadow-sm"><p class="text-sm text-slate-500">{{ $label }}</p><p class="mt-3 text-4xl font-semibold">{{ $value }}</p></div>
        @endforeach
    </div>
    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <section class="rounded-[2rem] bg-white p-6 shadow-sm"><h2 class="text-xl font-semibold">Последние обращения</h2><div class="mt-4 divide-y divide-slate-100">@forelse($latestAppeals as $appeal)<div class="py-3"><p class="font-medium">{{ $appeal->registered_number }} · {{ $appeal->topic }}</p><p class="text-sm text-slate-500">{{ $appeal->name }} · {{ $appeal->status }}</p></div>@empty <p class="text-slate-500">Нет обращений.</p>@endforelse</div></section>
        <section class="rounded-[2rem] bg-white p-6 shadow-sm"><h2 class="text-xl font-semibold">Последние новости</h2><div class="mt-4 divide-y divide-slate-100">@forelse($latestNews as $post)<div class="py-3"><p class="font-medium">{{ $post->title }}</p><p class="text-sm text-slate-500">{{ $post->status }} · {{ $post->category }}</p></div>@empty <p class="text-slate-500">Нет новостей.</p>@endforelse</div></section>
    </div>
</div>
