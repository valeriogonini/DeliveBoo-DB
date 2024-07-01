<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $dishes = [
            [
                'name' => 'Pizza Margherita',
                'description' => 'Pizza  con pomodori, mozzarella, basilico fresco, sale e olio extra vergine di oliva.',
                'price' => 8.50,
                'availability' => true,
                'image' => 'img/pizza_margherita.jpg'
            ],
            [
                'name' => 'Insalata Caesar',
                'description' => 'Lattuga fresca  romana con condimento Caesar, crostini e formaggio Parmigiano.',
                'price' => 6.75,
                'availability' => true,
                'image' => 'img/insalata_caesar.jpg'
            ],
            [
                'name' => 'Spaghetti alla Carbonara',
                'description' => "Spaghetti con salsa cremosa all'uovo, guanciale, formaggio pecorino e pepe nero.",
                'price' => 10.00,
                'availability' => false,
                'image' => 'img/spaghetti_carbonara.jpg'
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'Classico dessert italiano con strati di savoiardi imbevuti di caffè e crema al mascarpone.',
                'price' => 5.50,
                'availability' => true,
                'image' => 'img/tiramisu.jpg'
            ],
            [
                'name' => 'Minestrone',
                'description' => 'Zuppa italiana ricca di verdure, fagioli e pasta.',
                'price' => 7.25,
                'availability' => true,
                'image' => 'img/minestrone.jpg'
            ],
            [
                'name' => 'kebab classico',
                'description' => 'Piadina arrotolata con lattuga, pomodoro, cipolla, patatine fritte, kebab, salsa piccante, salsa yogurt.',
                'price' => 7.25,
                'availability' => true,
                'image' => 'img/minestrone.jpg'
            ],
            [
                'name' => 'Bistecca alla Fiorentina',
                'description' => 'Deliziosa bistecca di manzo alla griglia, tipica della cucina toscana.',
                'price' => 25.00,
                'availability' => true,
                'image' => 'img/bistecca_fiorentina.jpg'
            ],
            // Categoria: Pesce
            [
                'name' => 'Salmone al Forno',
                'description' => 'Filetto di salmone cotto al forno con erbe aromatiche e limone.',
                'price' => 18.50,
                'availability' => true,
                'image' => 'img/salmone_al_forno.jpg'
            ],
            // Categoria: Giapponese
            [
                'name' => 'Sushi Misto',
                'description' => 'Selezione di sushi con salmone, tonno, gamberi e avocado.',
                'price' => 22.00,
                'availability' => true,
                'image' => 'img/sushi_misto.jpg'
            ],
            // Categoria: Gluten Free
            [
                'name' => 'Insalata di Quinoa',
                'description' => 'Insalata fresca con quinoa, verdure miste e dressing leggero senza glutine.',
                'price' => 12.00,
                'availability' => true,
                'image' => 'img/insalata_quinoa.jpg'
            ],
            // Categoria: Messicano
            [
                'name' => 'Tacos di Pollo',
                'description' => 'Tacos di pollo con salsa piccante, guacamole e coriandolo fresco.',
                'price' => 9.50,
                'availability' => true,
                'image' => 'img/tacos_pollo.jpg'
            ],
            // Categoria: Fast Food
            [
                'name' => 'Cheeseburger',
                'description' => 'Classico cheeseburger con carne di manzo, formaggio cheddar, lattuga, pomodoro e cipolla.',
                'price' => 7.50,
                'availability' => true,
                'image' => 'img/cheeseburger.jpg'
            ]
        ];

        $restaurants = Restaurant::all();
        $restaurants_ids = $restaurants->pluck('id')->all();
        // DB::table('dishes')->truncate();

        foreach ($dishes as $dish) {

            $new_dishes = new Dish();
            $new_dishes->name = $dish['name'];
            $new_dishes->description = $dish['description'];
            $new_dishes->price = $dish['price'];
            $new_dishes->availability = $dish['availability'];
            $new_dishes->image = $dish['image'];
            $new_dishes->slug = Str::slug($dish['name']);
            $new_dishes->restaurant_id = $faker->randomElement($restaurants_ids);

            $new_dishes->save();
        }
    }
}
