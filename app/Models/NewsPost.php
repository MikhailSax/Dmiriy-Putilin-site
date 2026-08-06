<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class NewsPost extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'category', 'excerpt', 'content', 'image_path', 'gallery',
        'status', 'is_pinned', 'seo_title', 'seo_description', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'gallery' => 'array',
            'is_pinned' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    #[Scope]
    protected function published(Builder $query): void
    {
        $query->where('status', 'published')->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saving(function (self $post): void {
            if (blank($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
