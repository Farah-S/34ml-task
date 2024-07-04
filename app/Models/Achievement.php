<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'required_num'
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)
                    ->withTimestamps();
    }
}
