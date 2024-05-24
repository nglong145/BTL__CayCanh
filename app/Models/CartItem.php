<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_items';
    protected $primaryKey = 'CartItemID';
    public function CartItem(): HasMany
    {
        return $this->hasMany(CartItem::class, 'CartItemID');
    }
}
