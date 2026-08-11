<?php 

namespace App\Livewire;

use App\Models\Appeal;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AppealForm extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $address = '';
    public string $topic = '';
    public string $message = '';
    public array $attachments = [];
    public bool $consent = false;

    public function submit(): void
    {
        $key = 'appeal:'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $this->addError('message', 'Слишком много обращений. Попробуйте отправить форму позже.');
            return;
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'phone' => ['required', 'string', 'min:6', 'max:30'],
            'email' => ['nullable', 'email', 'max:120'],
            'address' => ['nullable', 'string', 'max:255'],
            'topic' => ['required', 'string', 'max:160'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
            'attachments.*' => ['nullable', 'file', 'max:5120', 'mimes:jpg,jpeg,png,pdf,doc,docx'],
            'consent' => ['accepted'],
        ]);

        RateLimiter::hit($key, 600);

        $appealData = collect($validated)->except('attachments', 'consent')->all();

        $files = collect($this->attachments)
            ->map(fn ($file) => $file->store('appeals', 'public'))
            ->values()
            ->all();

        $number = 'DP-'.now()->format('Ymd').'-'.Str::upper(Str::random(6));

        Appeal::create([
            ...$appealData,
            'files' => $files,
            'registered_number' => $number,
            'status_history' => [[
                'status' => 'new',
                'label' => 'Обращение зарегистрировано',
                'changed_at' => now()->toDateTimeString(),
            ]],
        ]);

        $this->reset('name', 'phone', 'email', 'address', 'topic', 'message', 'attachments', 'consent');

        session()->flash('appealStatus', "Ваше обращение принято. Номер обращения: {$number}. Мы свяжемся с вами после первичной проверки.");
    }

    public function render()
    {
        return view('livewire.appeal-form');
    }
}
