<div>
    <div class="mb-8 grid gap-4 rounded-[2rem] border border-slate-200 bg-white p-4 md:grid-cols-[1fr_220px]">
        <input wire:model.live.debounce.400ms="search" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" placeholder="Поиск по новостям" />
        <select wire:model.live="category" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3">
            <option value="">Все категории</option>
            @foreach ($categories as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        @forelse ($posts as $post)
            <article class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/70">
                <div class="h-52 bg-gradient-to-br from-blue-950 via-blue-800 to-red-700"></div>
                <div class="p-6">
                    <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.2em] text-red-600">
                        <span>{{ $post->category }}</span><span>{{ $post->published_at?->format('d.m.Y') }}</span>
                    </div>
                    <h2 class="mt-4 text-xl font-semibold text-slate-950">{{ $post->title }}</h2>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                    <a href="{{ route('news.show', $post) }}" class="mt-5 inline-flex font-semibold text-blue-900 hover:text-red-700">Читать</a>
                </div>
            </article>
        @empty
            <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-8 text-slate-500 md:col-span-3">Материалы пока не опубликованы.</div>
        @endforelse
    </div>

    <div class="mt-8">{{ $posts->links() }}</div>
</div>
