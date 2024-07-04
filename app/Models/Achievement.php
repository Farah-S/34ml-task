<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'required_num'
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)
                    ->withTimestamps();
    }
}
