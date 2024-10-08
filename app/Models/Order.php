<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name', 'total_price', 'email', 'phone_number','address'
    ];


    public function dishes(){

        return $this->belongsToMany(Dish::class)->withPivot('qty');
    }
}
