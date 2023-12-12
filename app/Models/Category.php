<?php

namespace App\Models;

use App\Models\Gift;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $guarded = [
        'id',
    ];

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }
}

