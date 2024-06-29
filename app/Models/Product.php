<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture', 'name', 'price', 'description', 'color', 'category_id', 'gender', 'size', 'condition', 'slug', 'store_id', 'status'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
