<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'OrderID';
    public function Order(): HasMany
    {
        return $this->hasMany(Order::class, 'OrderID');
    }

    public $timestamps = true;
}
