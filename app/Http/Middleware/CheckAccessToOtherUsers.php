<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use App\Models\Dish; // Assicurati di importare il modello appropriato
// use App\Models\Restaurant;
// use Illuminate\Support\Facades\Auth;

// class CheckAccessToOtherUsers
// {
//     public function handle(Request $request, Closure $next)
//     {

//         if (auth()->check()) {
//             $restaurantId = $request->route('restaurant');
//             $dishId = $request->route('dish');
//             $loggedInUserId = Auth::id();
//             $user = Auth::user();
//             $userRestaurant = $user->restaurant;
//             $userRestaurantId = $userRestaurant->id;
//             // dump($dishId);
//             // dump($userRestaurantId);

//             if ($restaurantId) {
//                 $restaurant = Restaurant::find($restaurantId);

//                 if (!$restaurant || $restaurant->user_id != $loggedInUserId) {
//                     abort(403, 'Accesso non consentito.');
//                 }
//             }

//             if ($dishId) {

//                 $dish = Dish::find($dishId);
//                 dump($dishId);
//                 if (!$dish || $dish->restaurant_id != $userRestaurantId) {
//                     abort(403, 'Accesso non consentito.');
//                 }
//             }
//         }

//         return $next($request);
//     }
// }

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Dish;
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
            $user = Auth::user();
            $userRestaurant = $user->restaurant;
            $userRestaurantId = $userRestaurant->id;

            // Debugging statements
            // dump('Dish ID: ' . $dishId);
            

            if ($restaurantId) {
                $restaurant = Restaurant::find($restaurantId);
                // dump($restaurant);
                if (!$restaurant || $restaurant->user_id != $loggedInUserId) {
                    abort(403, 'Accesso non consentito.');
                }
            }

            // if ($dishId) {
            //     $dish = Dish::find($dishId);
            //     // dump('User Restaurant ID: ' . $userRestaurantId);
            //     // dump($dish);

            //     // $current_dish = $dish->first(function ($dish_1) use ($userRestaurantId) {
            //     //     return $dish_1->restaurant_id == $userRestaurantId;
            //     // });

            //     // dump($current_dish);
            //      // Stop execution to check the output
            //     if (!$dish || $dish->restaurant_id != $userRestaurantId) {
            //         abort(403, 'Accesso non consentito.');
            //     }
            // }
        }

        return $next($request);
    }
}