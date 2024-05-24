<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'BlogID';
    public function Blog(): HasMany
    {
        return $this->hasMany(Blog::class, 'BlogID');
    }

    public $timestamps = true;
}
