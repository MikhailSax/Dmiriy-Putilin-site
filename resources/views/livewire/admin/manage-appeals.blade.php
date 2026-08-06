<div>
    <h1 class="text-4xl font-semibold tracking-tight">Обращения граждан</h1>
    <div class="mt-6 grid gap-4 rounded-[2rem] bg-white p-4 md:grid-cols-[1fr_220px]">
        <input wire:model.live.debounce.400ms="search" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" placeholder="Поиск по номеру, ФИО или теме" />
        <select wire:model.live="status" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3"><option value="">Все статусы</option><option value="new">Новое</option><option value="in_progress">В работе</option><option value="completed">Завершено</option></select>
    </div>
    <div class="mt-6 grid gap-4">
        @foreach ($appeals as $appeal)
            <article class="rounded-[2rem] bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div><p class="text-sm font-semibold text-red-600">{{ $appeal->registered_number }} · {{ $appeal->created_at->format('d.m.Y H:i') }}</p><h2 class="mt-2 text-xl font-semibold">{{ $appeal->topic }}</h2><p class="mt-2 text-slate-600">{{ $appeal->message }}</p><p class="mt-3 text-sm text-slate-500">{{ $appeal->name }} · {{ $appeal->phone }} · {{ $appeal->email }} · {{ $appeal->address }}</p></div>
                    <div class="flex gap-2"><button wire:click="updateStatus({{ $appeal->id }}, 'new')" class="rounded-full border px-3 py-2 text-xs">Новое</button><button wire:click="updateStatus({{ $appeal->id }}, 'in_progress')" class="rounded-full border px-3 py-2 text-xs">В работе</button><button wire:click="updateStatus({{ $appeal->id }}, 'completed')" class="rounded-full border px-3 py-2 text-xs">Завершено</button></div>
                </div>
            </article>
        @endforeach
    </div>
    <div class="mt-6">{{ $appeals->links() }}</div>
</div>
