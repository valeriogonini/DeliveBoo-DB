<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
  


    public function run(): void
    {
        
        $restaurants = [
            [
                'name'=> 'Da Mimmo',
                'image'=> 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email'=>'Mimmo@gmail.com',
                'address'=>'via Mimmo 69',
                'p_iva'=>'1234578910',
                
            ]
                

            
        ];

        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->name=$restaurant['name'];
            $new_restaurant->image=$restaurant['image'];
            $new_restaurant->email=$restaurant['email'];
            $new_restaurant->address=$restaurant['address'];
            $new_restaurant->p_iva=$restaurant['p_iva'];

            $new_restaurant->slug = Str::slug($restaurant['name']);
            $new_restaurant->save();
        }
    }
}
