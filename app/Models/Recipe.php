<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Recipe extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image_path',
        'cuisine_type_id',
        'dietary_type_id',
        'difficulty_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cuisineType(): BelongsTo
    {
        return $this->belongsTo(CuisineType::class);
    }

    public function dietaryType(): BelongsTo
    {
        return $this->belongsTo(DietaryType::class);
    }

    public function difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class);
    }

    public function getDescriptionSummaryAttribute(): string
    {
        $text = $this->description ?? '';

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

        return Str::limit(trim((string) $text), 120);
    }
}
