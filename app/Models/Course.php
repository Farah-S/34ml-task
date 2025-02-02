<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)
                    ->withPivot('completed')
                    ->withTimestamps();
    }

    public function lessons(): HasMany {
        return $this->hasMany(Lesson::class);
    }
}
