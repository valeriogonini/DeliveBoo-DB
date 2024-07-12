<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderMailable;
use Illuminate\Foundation\Http\FormRequest;
use Psy\Readline\Hoa\Console;
use App\Mail\OrderUserMail;
use App\Mail\OrderRestaurantMail;





class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        //generazione del token da braintree
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {

        $request->validated();
        $data = $request->all();

        $customer_name = $request->input('customer_name');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $address = $request->input('address');
        $total_price = $request->input('total_price');
        $amount = $request->input('amount');
        $orderData = json_decode($request->input('orderData'), true);
        $token = $request->input('token');


        $newOrder = $request->validate([
            'token' => 'required',
            'amount' => 'required',
            'customer_name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'phone_number' => 'required|max:20',
            'address' => 'required|max:250',
            'total_price' => 'required',
        ]);


        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => "fake-valid-nonce",
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'transazione eseguita con successo',


            ];


            // salvataggio nuovo ordine nel DB
            $order = new Order;
            $order->fill($newOrder);
            $order->save();

            Mail::to($email)->send(new OrderUserMail($newOrder)); 


            $restaurantId = $orderData[0]['restaurant_id'];
            $restaurant = Restaurant::where('id', $restaurantId)->first();
             $restaurant_mail = $restaurant->email;  
            

            // invio le mail di conferma al ristoratore
            Mail::to($restaurant_mail)->send(new OrderRestaurantMail($newOrder)); 

            // invio le mail di conferma all'utente
            

            foreach ($orderData as $dish) {
                // You can use the attach method if you have defined a many-to-many relationship in your Order model.
                $order->dishes()->attach($dish['id'], ['qty' => $dish['qty']]);
            }




            return response()->json($data, 200);
            // return view('admin.dashboard', compact('order'));
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita!'
            ];

            return response()->json($data, 401);
        }


    }

    public function fetchOrders()
    {

        $user = Auth::user();
        $restaurant = $user->restaurant;

        // recupero id dei piatti
        $dishIds = Dish::where('restaurant_id', $restaurant->id)->pluck('id');

        //recupero gli ordini legati al mio ristorante, tramite relazioni
        $myOrders = Order::whereHas('dishes', function ($query) use ($dishIds) {
            $query->whereIn('dishes.id', $dishIds);
        })->get();



        return view('admin.orders', compact('myOrders'));
    }

    public function show(Order $order) {

        // dd($order);

        return view('admin.order-detail',compact ('order'));
    }


}
