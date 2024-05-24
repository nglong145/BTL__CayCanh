<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $primaryKey = 'OrderItemID';
    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'OrderItemID');
    }
}
