<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillGroup extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function skills()
    {
        return $this->hasMany(Skill::class, 'group_key', 'group_key')->orderBy('order', 'asc');
    }
}
