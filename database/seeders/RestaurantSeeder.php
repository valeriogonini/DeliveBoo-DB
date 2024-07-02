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
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578911',

            ],
            [
                'name' => 'Da Mimmo2',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo2@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578910',

            ],
            [
                'name' => 'Da Mimmo3',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo3@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578912',

            ],
            [
                'name' => 'Da Mimmo4',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo4@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578913',

            ],
            [
                'name' => 'Da Mimmo5',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo5@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578914',

            ],
            [
                'name' => 'Da Mimmo6',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo6@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578915',

            ],
            [
                'name' => 'Da Mimmo7',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo7@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578916',

            ],
            [
                'name' => 'Da Mimmo8',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo8@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578917',

            ],
            [
                'name' => 'Da Mimmo9',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo9@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578918',

            ],
            [
                'name' => 'Da Mimmo10',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo10@gmail.com',
                'address' => 'via Mimmo 69',
                'p_iva' => '1234578919',

            ],
            [
                'name' => 'Da Mimmo11',
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2022/08/Pizzeria-Federico-Guardascione-Federico-Guardascione-scaled.webp',
                'email' => 'Mimmo11@gmail.com',
                'address' => 'via Mimmo 69',
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
