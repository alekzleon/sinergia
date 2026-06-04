<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'content',
        'image', 'category', 'tags', 'published_at',
        'is_published', 'author_name', 'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'tags'         => 'array',
    ];

    // Scopes
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
                     ->where('published_at', '<=', now());
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    // Mutators
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Helpers
    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('images/' . $this->image)
            : asset('images/default-post.jpg');
    }

    public function getReadingTimeAttribute(): int
    {
        return (int) ceil(str_word_count(strip_tags($this->content)) / 200);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
