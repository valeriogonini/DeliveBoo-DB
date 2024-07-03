<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Dish;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $orders = [
            [
                'customer_name' => 'Giovanni',
                'phone_number' => '3469579581',
                'email' => 'Giovanni@gmail.com',
                'address' => 'Via DI Giovanni',
                'total_price' => '50',
            ],
            [
                'customer_name' => 'Mauro',
                'phone_number' => '3469579582',
                'email' => 'Mauro@gmail.com',
                'address' => 'Via DI Mauro',
                'total_price' => '60',
            ],
            [
                'customer_name' => 'Luca',
                'phone_number' => '3469579583',
                'email' => 'Luca@gmail.com',
                'address' => 'Via DI Luca',
                'total_price' => '70',
            ],
            [
                'customer_name' => 'Samuele',
                'phone_number' => '3469579584',
                'email' => 'Samuele@gmail.com',
                'address' => 'Via DI Samuele',
                'total_price' => '80',
            ],
            [
                'customer_name' => 'Francesco',
                'phone_number' => '3469579585',
                'email' => 'Francesco@gmail.com',
                'address' => 'Via DI Francesco',
                'total_price' => '90',
            ],
            [
                'customer_name' => 'Laura',
                'phone_number' => '3469579586',
                'email' => 'Laura@gmail.com',
                'address' => 'Via DI Laura',
                'total_price' => '100',
            ],
            [
                'customer_name' => 'Martina',
                'phone_number' => '3469579587',
                'email' => 'Martina@gmail.com',
                'address' => 'Via DI Martina',
                'total_price' => '40',
            ],
            [
                'customer_name' => 'Claudia',
                'phone_number' => '3469579588',
                'email' => 'Claudia@gmail.com',
                'address' => 'Via DI Claudia',
                'total_price' => '30',
            ],
            [
                'customer_name' => 'Pietro',
                'phone_number' => '3469579589',
                'email' => 'Pietro@gmail.com',
                'address' => 'Via DI Pietro',
                'total_price' => '20',
            ],
            [
                'customer_name' => 'Valerio',
                'phone_number' => '3469579590',
                'email' => 'Valerio@gmail.com',
                'address' => 'Via DI Valerio',
                'total_price' => '10',
            ],
            [
                'customer_name' => 'Pippo',
                'phone_number' => '3469579534',
                'email' => 'Pippo@gmail.com',
                'address' => 'Via DI Pippo',
                'total_price' => '50',
            ],
            [
                'customer_name' => 'Franco',
                'phone_number' => '3469579382',
                'email' => 'Franco@gmail.com',
                'address' => 'Via DI Franco',
                'total_price' => '60',
            ],
            [
                'customer_name' => 'Angela',
                'phone_number' => '3459579583',
                'email' => 'Angela@gmail.com',
                'address' => 'Via DI Angela',
                'total_price' => '70',
            ],
            [
                'customer_name' => 'Michele',
                'phone_number' => '3469559584',
                'email' => 'Michele@gmail.com',
                'address' => 'Via DI Michele',
                'total_price' => '80',
            ],
            [
                'customer_name' => 'Flavia',
                'phone_number' => '3469570585',
                'email' => 'Flavia@gmail.com',
                'address' => 'Via DI Flavia',
                'total_price' => '90',
            ],
            [
                'customer_name' => 'Giacomo',
                'phone_number' => '3469579506',
                'email' => 'Giacomo@gmail.com',
                'address' => 'Via DI Giacomo',
                'total_price' => '100',
            ],
            [
                'customer_name' => 'Dario',
                'phone_number' => '3469579007',
                'email' => 'Dario@gmail.com',
                'address' => 'Via DI Dario',
                'total_price' => '40',
            ],
            [
                'customer_name' => 'Filippo',
                'phone_number' => '3469500088',
                'email' => 'Filippo@gmail.com',
                'address' => 'Via DI Filippo',
                'total_price' => '30',
            ],
            [
                'customer_name' => 'Pietrino',
                'phone_number' => '3463459589',
                'email' => 'Pietrino@gmail.com',
                'address' => 'Via DI Pietrino',
                'total_price' => '20',
            ],
         
        ];

        

            // Popolo l'array scorrento gli item generati
          
                


        foreach ($orders as $order) {
            
            $new_order = new Order();
            $new_order->customer_name = $order['customer_name'];
            $new_order->phone_number = $order['phone_number'];
            $new_order->email = $order['email'];
            $new_order->address = $order['address'];
            $new_order->total_price = $order['total_price'];
            $new_order->save();
            $random_qty = $faker->numberBetween(1,10);
            $new_order->dishes()->attach($random_qty);
        }
    }
}
