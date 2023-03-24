<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'organiser',
        'description'
    ];

    public function attendants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'meeting_attendants', 'meeting_id', 'user_id')->withPivot('participate');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
