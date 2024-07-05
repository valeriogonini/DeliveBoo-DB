<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all();
        $dishes = Dish::with('restaurant')->get();
        return response()->json([
            'dishes' => $dishes
        ]);
    }
}
