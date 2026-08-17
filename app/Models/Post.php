<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'content',
        'image_path',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostComment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

    public function getContentSummaryAttribute(): string
    {
        $text = $this->content ?? '';

        $text = preg_replace('/```[\s\S]*?```/m', '', $text);
        $text = preg_replace('/`([^`]+)`/', '$1', $text);
        $text = preg_replace('/(\*\*|__)(.*?)\1/', '$2', $text);
        $text = preg_replace('/(\*|_)(.*?)\1/', '$2', $text);
        $text = preg_replace('/^#{1,6}\s*/m', '', $text);
        $text = preg_replace('/!\[[^\]]*\]\([^)]+\)/', '', $text);
        $text = preg_replace('/\[([^\]]+)\]\([^)]+\)/', '$1', $text);
        $text = preg_replace('/^\s*[-+*]\s+/m', '', $text);
        $text = preg_replace('/^\s*\d+\.\s+/m', '', $text);
        $text = preg_replace('/^>\s?/m', '', $text);
        $text = preg_replace('/\s+/', ' ', $text);

        return Str::limit(trim((string) $text), 200);
    }
}
