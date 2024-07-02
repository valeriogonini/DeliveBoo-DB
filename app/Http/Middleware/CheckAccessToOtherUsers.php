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
        // Verifica se l'utente è autenticato
        if (auth()->check()) {
            // Ottieni l'ID del piatto dalla richiesta
            $restaurantId = $request->route('restaurant');
            $dishId = $request->route('dish');
            $loggedInUserId = Auth::id();
            // dd($restaurantId);

            if ($restaurantId) {
                // Trova il piatto nel database
                $restaurant = Restaurant::find($restaurantId);

                if ($dishId) {
                    $dish = Dish::find($dishId);
                }

                // Se il piatto non esiste o non appartiene all'utente autenticato
                if (!$restaurant || $restaurant->user_id != $loggedInUserId) {
                    abort(403, 'Accesso non consentito.');
                }
            }
        }

        return $next($request);
    }
}
