<div>
    @if ($pinned->isNotEmpty())
        <div class="mb-8 grid gap-5 lg:grid-cols-2">
            @foreach ($pinned as $post)
                <a href="{{ route('blog.show', $post) }}" class="rounded-[2rem] bg-blue-950 p-8 text-white transition hover:-translate-y-1 hover:bg-blue-900">
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-red-200">Закреплено · {{ $post->category }}</p>
                    <h2 class="mt-4 text-3xl font-semibold">{{ $post->title }}</h2>
                    <p class="mt-4 text-blue-100">{{ $post->excerpt }}</p>
                </a>
            @endforeach
        </div>
    @endif

    <div class="mb-8 grid gap-4 rounded-[2rem] border border-slate-200 bg-white p-4 md:grid-cols-[1fr_220px]">
        <input wire:model.live.debounce.400ms="search" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" placeholder="Поиск по блогу" />
        <select wire:model.live="category" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3">
            <option value="">Все категории</option>
            @foreach ($categories as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        @forelse ($posts as $post)
            <article class="rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/70">
                <p class="text-sm font-semibold text-red-600">{{ $post->category }} · {{ $post->published_at?->format('d.m.Y') }}</p>
                <h2 class="mt-4 text-2xl font-semibold text-slate-950">{{ $post->title }}</h2>
                <p class="mt-3 leading-7 text-slate-600">{{ $post->excerpt }}</p>
                <a href="{{ route('blog.show', $post) }}" class="mt-5 inline-flex font-semibold text-blue-900 hover:text-red-700">Читать статью</a>
            </article>
        @empty
            <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-8 text-slate-500 md:col-span-2">Публикации пока не добавлены.</div>
        @endforelse
    </div>

    <div class="mt-8">{{ $posts->links() }}</div>
</div>
