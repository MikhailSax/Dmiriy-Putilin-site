<?php

namespace App\Livewire;

use Livewire\Component;

class AppealForm extends Component
{
    public string $name = '';

    public string $phone = '';

    public string $email = '';

    public string $topic = '';

    public string $message = '';

    public function submit(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'phone' => ['required', 'string', 'min:6', 'max:30'],
            'email' => ['nullable', 'email', 'max:120'],
            'topic' => ['required', 'string', 'max:160'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        $this->reset('name', 'phone', 'email', 'topic', 'message');

        session()->flash('appealStatus', 'Обращение принято. Мы свяжемся с вами после регистрации заявки.');
    }

    public function render()
    {
        return view('livewire.appeal-form');
    }
}
