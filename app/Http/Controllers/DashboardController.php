<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Order;



class DashboardController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->get();

        $user = Auth::user();
        $restaurant = $user->restaurant;

        // recupero id dei piatti
        $dishIds = Dish::where('restaurant_id', $restaurant->id)->pluck('id');

        //recupero gli ordini legati al mio ristorante, tramite relazioni
        $myOrders = Order::whereHas('dishes', function($query) use ($dishIds) {
            $query->whereIn('dishes.id', $dishIds);
        })->orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('restaurants','myOrders'));
    }
}
