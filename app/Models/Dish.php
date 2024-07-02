<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'image', 'description', 'price', 'availability', 'restaurant_id'
    ];

    public function orders()
    {

        return $this->belongsToMany(Order::class);
    }

    public function restaurant()
    {

        return $this->belongsTo(Restaurant::class);
    }
}
