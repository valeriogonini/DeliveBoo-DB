<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all();
        $restaurants = Restaurant::with('types')->get();
        return response()->json([
            'restaurants' => $restaurants
        ]);
    }

}
