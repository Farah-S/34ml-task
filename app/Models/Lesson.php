<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)
                    ->withPivot('completed');
    }

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
