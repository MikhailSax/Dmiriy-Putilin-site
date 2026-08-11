<x-public.layout title="Обращения граждан" description="Как направить обращение депутату Дмитрию Путилину и получить ответ.">
    <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="card p-8 lg:p-10"><p class="eyebrow">Обращения граждан</p><h1 class="mt-4 text-4xl font-bold tracking-[-0.05em] sm:text-5xl">Если у вас есть вопрос, предложение или проблема, вы можете направить обращение депутату.</h1><a href="#appeal-form" class="btn-primary mt-8">Направить обращение</a></div>
            <div class="card p-8"><h2 class="text-2xl font-bold">Способы обращения</h2><div class="mt-6 grid gap-4 sm:grid-cols-2">@foreach(['Онлайн-форма','Электронная почта','Личный приём','Почтовое обращение'] as $method)<div class="rounded-2xl border border-slate-200 bg-slate-50 p-5"><p class="font-bold text-blue-950">{{ $method }}</p><p class="mt-2 text-sm leading-6 text-slate-600">Выберите удобный формат связи с приёмной.</p></div>@endforeach</div></div>
        </div>
    </section>
    <section id="appeal-form" class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8"><livewire:appeal-form /></section>
    <section class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8"><h2 class="section-title">FAQ</h2><div class="mt-6 grid gap-3">@foreach(['Как подать обращение?' => 'Заполните онлайн-форму или используйте другие способы связи, указанные на странице.', 'Какие данные необходимо указать?' => 'ФИО, телефон, тему и текст обращения; адрес можно указать при необходимости.', 'Сколько рассматривается обращение?' => 'Обращения рассматриваются в порядке, предусмотренном действующим законодательством.', 'Как получить ответ?' => 'Ответ направляется по указанным контактам после рассмотрения обращения.'] as $q => $a)<details class="card p-5"><summary class="cursor-pointer font-bold">{{ $q }}</summary><p class="mt-3 text-sm leading-6 text-slate-600">{{ $a }}</p></details>@endforeach</div></section>
</x-public.layout>
