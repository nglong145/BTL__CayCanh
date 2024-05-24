<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    public function product(): HasMany
    {
        return $this->hasMany(products::class, 'ProductID');
    }
}
