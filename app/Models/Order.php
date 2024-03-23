<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quantity',
        'status_id'
    ];

public function status()
{
    return $this->belongsTo(Status::class);
}
public function items()
{
    return $this->belongsToMany(Item::class,'order_item');
}
}
