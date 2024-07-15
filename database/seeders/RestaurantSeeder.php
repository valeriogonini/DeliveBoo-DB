<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


class RestaurantSeeder extends Seeder
{
  


    public function run(Faker $faker): void
    {
        
        $restaurants = [
            [
                'name' => 'Da Mimmo',
                'image' => '\uploads\trattoria-1024x768.jpg',
                'email' => 'Mimmo@gmail.com',
                'address' => 'via Mimmo 24',
                'p_iva' => '1234578911',

            ],
            [
                'name' => 'Non Solo Farina',
                'image' => '\uploads\2022-08-26.jpg',
                'email' => 'Pippo@gmail.com',
                'address' => 'via Diaz 35',
                'p_iva' => '1234578910',

            ],
            [
                'name' => 'Braceria 360 gradi',
                'image' => '\uploads\src_25591943.jpg',
                'email' => 'Gennaro@gmail.com',
                'address' => 'via Gennaro 32',
                'p_iva' => '1234578912',

            ],
            [
                'name' => 'Burger King',
                'image' => '\uploads\BK.jpg',
                'email' => 'BK@gmail.com',
                'address' => 'via BK 45',
                'p_iva' => '1234578913',

            ],
            [
                'name' => 'Pancrazio',
                'image' => '\uploads\ristorante-pancrazio-rome-christmas-2048x1536.jpg',
                'email' => 'Cosimo@gmail.com',
                'address' => 'via Garibaldi 69',
                'p_iva' => '1234578914',

            ],
            [
                'name' => 'Verduriamo',
                'image' => '\uploads\vegan.jpg',
                'email' => 'Pietro@gmail.com',
                'address' => 'via Sempre Verde 12',
                'p_iva' => '1234578915',

            ],
            [
                'name' => 'Da Luigi',
                'image' => '\uploads\0f6f0f60-32bd-460e-9ab5-7c748cd37545.avif',
                'email' => 'Luigi@gmail.com',
                'address' => 'via Militello 87',
                'p_iva' => '1234578916',

            ],
            [
                'name' => 'Hola Amigos',
                'image' => '\uploads\messicanos.jpg',
                'email' => 'Giulio@gmail.com',
                'address' => 'via Mariachi 68',
                'p_iva' => '1234578917',

            ],
            [
                'name' => 'Sora Cencia',
                'image' => '\uploads\07f0f058-80d9-4b3e-8c4c-c1c935ad4679.jpg',
                'email' => 'Nicola@gmail.com',
                'address' => 'via Marettimo 98',
                'p_iva' => '1234578918',

            ],
            [
                'name' => 'Konnichiwa',
                'image' => '\uploads\sushiR.jpg',
                'email' => 'Konnichiwa@gmail.com',
                'address' => 'via Delle Marmotte 96',
                'p_iva' => '1234578919',

            ],
            [
                'name' => 'Kebab Campus',
                'image' => '\uploads\kebabbaro.jpg',
                'email' => 'Mimmo11@gmail.com',
                'address' => 'via Campus 18',
                'p_iva' => '1234578920',

            ],
                

            
        ];

        $users = User::all();
        $users_ids = $users->pluck('id')->all();
        // DB::table('restaurants')->truncate();


        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->name=$restaurant['name'];
            $new_restaurant->image=$restaurant['image'];
            $new_restaurant->email=$restaurant['email'];
            $new_restaurant->address=$restaurant['address'];
            $new_restaurant->p_iva=$restaurant['p_iva'];
            $new_restaurant->user_id = $faker->unique()->randomElement($users_ids);

            $new_restaurant->slug = Str::slug($restaurant['name']);
            $new_restaurant->save();
        }
    }
}
