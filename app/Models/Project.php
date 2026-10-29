<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get category filters as an array.
     */
    public function getCategoriesAttribute(): array
    {
        if (empty($this->category_filter)) {
            return [];
        }
        return array_values(array_filter(array_map('trim', explode(',', $this->category_filter))));
    }
}
