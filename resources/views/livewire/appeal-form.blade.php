<form wire:submit="submit" class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-sm shadow-slate-200/60 backdrop-blur md:p-8"> 
    <div class="mb-6"> 
        <p class="text-sm font-medium uppercase tracking-[0.3em] text-red-600">Общественная приёмная</p> 
        <h2 class="mt-2 text-3xl font-semibold tracking-tight text-slate-950">Отправить обращение</h2> 
        <p class="mt-3 text-slate-600">Заполните форму — обращение будет зарегистрировано без перезагрузки страницы.</p> 
    </div> 

    @if (session('appealStatus')) 
        <div class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800"> 
            {{ session('appealStatus') }} 
        </div> 
    @endif 

    <div class="grid gap-4 md:grid-cols-2"> 
        <label class="block text-sm font-medium text-slate-700">ФИО 
            <input wire:model="name" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Иванов Иван" /> 
            @error('name') 
                <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> 
            @enderror 
        </label> 

        <label class="block text-sm font-medium text-slate-700">Телефон 
            <input wire:model="phone" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="+7 900 000-00-00" /> 
            @error('phone') 
                <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> 
            @enderror 
        </label> 

        <label class="block text-sm font-medium text-slate-700">Email 
            <input wire:model="email" type="email" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="mail@example.ru" /> 
            @error('email') 
                <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> 
            @enderror 
        </label> 

        <label class="block text-sm font-medium text-slate-700">Адрес 
            <input wire:model="address" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Улица, дом, подъезд" /> 
            @error('address') 
                <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> 
            @enderror 
        </label> 

        <label class="block text-sm font-medium text-slate-700 md:col-span-2">Тема 
            <input wire:model="topic" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Благоустройство, ЖКХ, transport" /> 
            @error('topic') 
                <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> 
            @enderror 
        </label> 
    </div> 

    <label class="mt-4 block text-sm font-medium text-slate-700">Текст обращения 
        <textarea wire:model="message" rows="5" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Кратко опишите ситуацию, адрес и желаемый результат"></textarea> 
        @error('message') 
            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> 
        </error> 
    </label> 

    <label class="mt-4 block text-sm font-medium text-slate-700">Прикрепить файлы 
        <input wire:model="attachments" type="file" multiple class="mt-2 w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-4 text-sm file:mr-4 file:rounded-full file:border-0 file:bg-blue-900 file:px-4 file:py-2 file:text-white" /> 
        <span class="mt-2 block text-xs text-slate-500">JPG, PNG, PDF, DOC, DOCX до 5 МБ.</span> 
        @error('attachments.*') 
            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> 
        </error> 
    </label> 

    <button type="submit" class="mt-6 inline-flex w-full items-center justify-center rounded-2xl bg-blue-950 px-6 py-4 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-100 md:w-auto"> 
        <span wire:loading.remove wire:target="submit">Зарегистрировать обращение</span> 
        <span wire:loading wire:target="submit">Отправляем...</span> 
    </button> 
</form>

