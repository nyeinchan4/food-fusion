<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
