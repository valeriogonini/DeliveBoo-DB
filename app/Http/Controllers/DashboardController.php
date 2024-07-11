<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Order;
use Carbon\Carbon;



class DashboardController extends Controller
{
    public function index()
    {

        $restaurants = Restaurant::where('user_id', Auth::id())->get();
        $user = Auth::user();
        $restaurant = $user->restaurant;

        if ($restaurant) {
            $dishIds = Dish::where('restaurant_id', $restaurant->id)->pluck('id');

            //recupero gli ordini legati al mio ristorante, tramite relazioni
            $myOrders = Order::whereHas('dishes', function ($query) use ($dishIds) {
                $query->whereIn('dishes.id', $dishIds);

            })->orderBy('created_at', 'desc')->get();





            $totalOrders = Order::all();

            // $totalgenuary = Order::where($totalOrders, '%-01-%')->get();

            // $orders = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            //        ->groupBy('year', 'month')
            //        ->orderBy('year')
            //        ->orderBy('month')
            //        ->get();

            //        foreach($orders as $order){
            //         dd($order);
            //        };

            // $august = 8;
            // $ordine = Order::query()->whereMonth('created_at', $august)->get();
            // dd($ordine);
            // Recupera tutti gli ordini
            

            // Raggruppa gli ordini per mese
            $groupedOrders = $myOrders->groupBy(function ($order) {
                return Carbon::parse($order->created_at)->format('M-Y');
            });

            // Prepara i dati per Chart.js
            $labels = $groupedOrders->keys();
            $data = $groupedOrders->map(function ($orders, $key) {
                return $orders->count();
            });


            // Array per contenere i dati da codificare in JSON
            $monthlyTotalPrices = [];

            // Calcola la somma totale dei prezzi per ogni mese
            foreach ($groupedOrders as $month => $orders) {
                $totalPrice = $orders->sum('total_price');
                $monthlyTotalPrices[] = [
                    'month' => $month,
                    'total_price' => $totalPrice,
                ];
            }


            $jsonMonthlyTotalPrices = $monthlyTotalPrices;






            return view('admin.dashboard', compact('restaurants', 'myOrders', 'jsonMonthlyTotalPrices'));
        }

        return view('admin.dashboard', compact('restaurants'));
    }
    // recupero id dei piatti

}
