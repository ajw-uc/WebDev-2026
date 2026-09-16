<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

#[Fillable(['user_id', 'content', 'image'])]
class Post extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    protected function formattedCreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at->diffForHumans()
        );
    }

    protected function formattedUpdatedAt(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->diffForHumans()
        );
    }

    protected function formattedDeletedAt(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->deleted_at?->diffForHumans()
        );
    }
}
