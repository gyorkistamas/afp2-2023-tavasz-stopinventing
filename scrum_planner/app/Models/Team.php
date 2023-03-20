<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
        'scrum_master'
    ];

    public function members(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, TeamMember::class);
    }
}
