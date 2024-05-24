<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ImageProduct extends Model
{
    use HasFactory;
    protected $table = 'image_products';
    protected $primaryKey = 'ImgID';
    public function ImageProduct(): HasMany
    {
        return $this->hasMany(ImageProduct::class, 'ImgID');
    }
}
