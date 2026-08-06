<form wire:submit="submit" class="rounded-[2rem] border border-slate-200 bg-white/90 p-6 shadow-sm shadow-slate-200/60 backdrop-blur md:p-8">
    <div class="mb-6">
        <p class="text-sm font-medium uppercase tracking-[0.3em] text-blue-700">Форма обращения</p>
        <h2 class="mt-2 text-3xl font-semibold tracking-tight text-slate-950">Напишите депутату</h2>
        <p class="mt-3 text-slate-600">Опишите вопрос, проблему двора или предложение по развитию округа. Заявка будет передана в работу.</p>
    </div>

    @if (session('appealStatus'))
        <div class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('appealStatus') }}
        </div>
    @endif

    <div class="grid gap-4 md:grid-cols-2">
        <label class="block text-sm font-medium text-slate-700">ФИО
            <input wire:model="name" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Иванов Иван" />
            @error('name') <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> @enderror
        </label>
        <label class="block text-sm font-medium text-slate-700">Телефон
            <input wire:model="phone" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="+7 900 000-00-00" />
            @error('phone') <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> @enderror
        </label>
        <label class="block text-sm font-medium text-slate-700">Email
            <input wire:model="email" type="email" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="mail@example.ru" />
            @error('email') <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> @enderror
        </label>
        <label class="block text-sm font-medium text-slate-700">Тема
            <input wire:model="topic" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Благоустройство, ЖКХ, транспорт" />
            @error('topic') <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> @enderror
        </label>
    </div>

    <label class="mt-4 block text-sm font-medium text-slate-700">Сообщение
        <textarea wire:model="message" rows="5" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Кратко опишите ситуацию и адрес, если он важен"></textarea>
        @error('message') <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> @enderror
    </label>

    <button type="submit" class="mt-6 inline-flex w-full items-center justify-center rounded-2xl bg-slate-950 px-6 py-4 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 md:w-auto">
        Отправить обращение
    </button>
</form>
