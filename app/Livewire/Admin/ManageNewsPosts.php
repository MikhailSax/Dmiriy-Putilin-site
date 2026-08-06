<?php

namespace App\Livewire\Admin;

use App\Models\NewsPost;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class ManageNewsPosts extends Component
{
    use WithPagination;

    public ?int $editingId = null;
    public string $title = '';
    public string $slug = '';
    public string $category = 'Округ';
    public string $excerpt = '';
    public string $content = '';
    public string $status = 'draft';
    public bool $isPinned = false;
    public string $seoTitle = '';
    public string $seoDescription = '';

    public function edit(int $id): void
    {
        $post = NewsPost::findOrFail($id);
        $this->editingId = $post->id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->category = $post->category;
        $this->excerpt = $post->excerpt;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->isPinned = $post->is_pinned;
        $this->seoTitle = $post->seo_title ?? '';
        $this->seoDescription = $post->seo_description ?? '';
    }

    public function save(): void
    {
        $data = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:120'],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
            'isPinned' => ['boolean'],
            'seoTitle' => ['nullable', 'string', 'max:255'],
            'seoDescription' => ['nullable', 'string', 'max:500'],
        ]);

        NewsPost::updateOrCreate(['id' => $this->editingId], [
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'slug' => $data['slug'] ?: Str::slug($data['title']),
            'category' => $data['category'],
            'excerpt' => $data['excerpt'],
            'content' => $data['content'],
            'status' => $data['status'],
            'is_pinned' => $data['isPinned'],
            'seo_title' => $data['seoTitle'],
            'seo_description' => $data['seoDescription'],
            'published_at' => $data['status'] === 'published' ? now() : null,
        ]);

        $this->resetForm();
    }

    public function delete(int $id): void
    {
        NewsPost::findOrFail($id)->delete();
    }

    public function resetForm(): void
    {
        $this->reset('editingId', 'title', 'slug', 'excerpt', 'content', 'seoTitle', 'seoDescription');
        $this->category = 'Округ';
        $this->status = 'draft';
        $this->isPinned = false;
    }

    public function render()
    {
        return view('livewire.admin.manage-news-posts', ['posts' => NewsPost::latest()->paginate(10)]);
    }
}
