<?php

namespace App\Livewire\Admin;

use App\Models\Appeal;
use Livewire\Component;
use Livewire\WithPagination;

class ManageAppeals extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';

    public function updateStatus(int $id, string $status): void
    {
        $appeal = Appeal::findOrFail($id);
        $history = $appeal->status_history ?? [];
        $history[] = ['status' => $status, 'label' => 'Статус изменён администратором', 'changed_at' => now()->toDateTimeString()];
        $appeal->update(['status' => $status, 'status_history' => $history]);
    }

    public function render()
    {
        $appeals = Appeal::query()
            ->when($this->search, fn ($query) => $query->where(fn ($q) => $q->where('registered_number', 'like', "%{$this->search}%")->orWhere('name', 'like', "%{$this->search}%")->orWhere('topic', 'like', "%{$this->search}%")))
            ->when($this->status, fn ($query) => $query->where('status', $this->status))
            ->latest()
            ->paginate(12);

        return view('livewire.admin.manage-appeals', compact('appeals'));
    }
}
