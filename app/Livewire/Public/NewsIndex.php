<?php

namespace App\Livewire\Public;

use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class NewsIndex extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public string $search = '';

    #[Url]
    public string $category = '';

    public function updatedSearch(): void { $this->resetPage(); }
    public function updatedCategory(): void { $this->resetPage(); }

    public function render()
    {
        $categories = NewsPost::published()->select('category')->distinct()->orderBy('category')->pluck('category');
        $posts = NewsPost::published()
            ->when($this->search, fn ($query) => $query->where(fn ($q) => $q->where('title', 'like', "%{$this->search}%")->orWhere('excerpt', 'like', "%{$this->search}%")))
            ->when($this->category, fn ($query) => $query->where('category', $this->category))
            ->latest('published_at')
            ->paginate(9);

        return view('livewire.public.news-index', compact('categories', 'posts'));
    }
}
