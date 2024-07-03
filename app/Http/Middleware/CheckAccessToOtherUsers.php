<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Dish; // Assicurati di importare il modello appropriato
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class CheckAccessToOtherUsers
{
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check()) {
            $restaurantId = $request->route('restaurant');
            $dishId = $request->route('dish');
            $loggedInUserId = Auth::id();

            if ($restaurantId) {
                $restaurant = Restaurant::find($restaurantId);

                if (!$restaurant || $restaurant->user_id != $loggedInUserId) {
                    abort(403, 'Accesso non consentito.');
                }
            }

            if ($dishId) {
                $user = Auth::user();
                $userRestaurant = $user->restaurant;
                $userRestaurantId = $userRestaurant->id;
                $dish = Dish::find($dishId);
                if (!$dish || $dish->restaurant_id != $userRestaurantId) {
                    abort(403, 'Accesso non consentito.');
                }
            }
        }

        return $next($request);
    }
}