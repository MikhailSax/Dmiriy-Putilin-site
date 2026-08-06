<?php

namespace App\Livewire\Public;

use App\Models\BlogPost;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
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
        $categories = BlogPost::published()->select('category')->distinct()->orderBy('category')->pluck('category');
        $pinned = BlogPost::published()->where('is_pinned', true)->latest('published_at')->take(2)->get();
        $posts = BlogPost::published()
            ->when($this->search, fn ($query) => $query->where(fn ($q) => $q->where('title', 'like', "%{$this->search}%")->orWhere('excerpt', 'like', "%{$this->search}%")))
            ->when($this->category, fn ($query) => $query->where('category', $this->category))
            ->latest('published_at')
            ->paginate(8);

        return view('livewire.public.blog-index', compact('categories', 'pinned', 'posts'));
    }
}
