<div class="grid gap-8 xl:grid-cols-[420px_1fr]">
    <form wire:submit="save" class="rounded-[2rem] bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold">{{ $editingId ? 'Редактировать' : 'Создать' }} материал</h1>
        <div class="mt-5 grid gap-4">
            <input wire:model="title" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" placeholder="Заголовок" />
            <input wire:model="slug" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" placeholder="URL slug (можно пустым)" />
            <input wire:model="category" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" placeholder="Категория" />
            <textarea wire:model="excerpt" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" rows="3" placeholder="Краткое описание"></textarea>
            <textarea wire:model="content" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" rows="8" placeholder="Полный текст"></textarea>
            <select wire:model="status" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3"><option value="draft">Черновик</option><option value="published">Опубликовано</option></select>
            <label class="flex items-center gap-3 text-sm"><input wire:model="isPinned" type="checkbox" class="rounded"> Закрепить</label>
            <input wire:model="seoTitle" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" placeholder="SEO title" />
            <textarea wire:model="seoDescription" class="rounded-2xl border-slate-200 bg-slate-50 px-4 py-3" rows="2" placeholder="SEO description"></textarea>
        </div>
        <div class="mt-5 flex gap-3"><button class="rounded-2xl bg-blue-950 px-5 py-3 font-semibold text-white hover:bg-red-700">Сохранить</button><button type="button" wire:click="resetForm" class="rounded-2xl border border-slate-200 px-5 py-3">Очистить</button></div>
    </form>

    <section class="rounded-[2rem] bg-white p-6 shadow-sm">
        <h2 class="text-2xl font-semibold">Материалы</h2>
        <div class="mt-5 overflow-x-auto">
            <table class="w-full text-left text-sm"><thead><tr class="border-b text-slate-500"><th class="py-3">Заголовок</th><th>Категория</th><th>Статус</th><th></th></tr></thead><tbody>
                @foreach ($posts as $post)
                    <tr class="border-b border-slate-100"><td class="py-3 font-medium">{{ $post->title }}</td><td>{{ $post->category }}</td><td>{{ $post->status }}</td><td class="space-x-2 text-right"><button wire:click="edit({{ $post->id }})" class="text-blue-900">Изменить</button><button wire:click="delete({{ $post->id }})" wire:confirm="Удалить материал?" class="text-red-700">Удалить</button></td></tr>
                @endforeach
            </tbody></table>
        </div>
        <div class="mt-5">{{ $posts->links() }}</div>
    </section>
</div>
