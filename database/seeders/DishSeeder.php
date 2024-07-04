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
                'image' => '\uploads\pizza_margherita.jpg'
            ],
            [
                'name' => 'Insalata Caesar',
                'description' => 'Lattuga fresca  romana con condimento Caesar, crostini e formaggio Parmigiano.',
                'price' => 6.75,
                'availability' => true,
                'image' => '\uploads\insalata_cesar.jpg'
            ],
            [
                'name' => 'Spaghetti alla Carbonara',
                'description' => "Spaghetti con salsa cremosa all'uovo, guanciale, formaggio pecorino e pepe nero.",
                'price' => 10.00,
                'availability' => false,
                'image' => '\uploads\spaghetti_carbonare.jpg'
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'Classico dessert italiano con strati di savoiardi imbevuti di caffè e crema al mascarpone.',
                'price' => 5.50,
                'availability' => true,
                'image' => '\uploads\tiramisu.jpg'
            ],
            [
                'name' => 'Minestrone',
                'description' => 'Zuppa italiana ricca di verdure, fagioli e pasta.',
                'price' => 7.25,
                'availability' => true,
                'image' => '\uploads\minestrone.jpg'
            ],
            [
                'name' => 'kebab classico',
                'description' => 'Piadina arrotolata con lattuga, pomodoro, cipolla, patatine fritte, kebab, salsa piccante, salsa yogurt.',
                'price' => 7.25,
                'availability' => true,
                'image' => '\uploads\kebab.jpg'
            ],
            [
                'name' => 'Bistecca alla Fiorentina',
                'description' => 'Deliziosa bistecca di manzo alla griglia, tipica della cucina toscana.',
                'price' => 25.00,
                'availability' => true,
                'image' => '\uploads\Bistecca-Alla-Fiorentina.webp'
            ],
            // Categoria: Pesce
            [
                'name' => 'Salmone al Forno',
                'description' => 'Filetto di salmone cotto al forno con erbe aromatiche e limone.',
                'price' => 18.50,
                'availability' => true,
                'image' => '\uploads\salmone.jpg'
            ],
            // Categoria: Giapponese
            [
                'name' => 'Sushi Misto',
                'description' => 'Selezione di sushi con salmone, tonno, gamberi e avocado.',
                'price' => 22.00,
                'availability' => true,
                'image' => '\uploads\sushi-misto.jpg'
            ],
            // Categoria: Gluten Free
            [
                'name' => 'Insalata di Quinoa',
                'description' => 'Insalata fresca con quinoa, verdure miste e dressing leggero senza glutine.',
                'price' => 12.00,
                'availability' => true,
                'image' => '\uploads\insalata_quinoa.jpg'
            ],
            // Categoria: Messicano
            [
                'name' => 'Tacos di Pollo',
                'description' => 'Tacos di pollo con salsa piccante, guacamole e coriandolo fresco.',
                'price' => 9.50,
                'availability' => true,
                'image' => '\uploads\tacos_di_pollo.jpg'
            ],
            // Categoria: Fast Food
            [
                'name' => 'Cheeseburger',
                'description' => 'Classico cheeseburger con carne di manzo, formaggio cheddar, lattuga, pomodoro e cipolla.',
                'price' => 7.50,
                'availability' => true,
                'image' => '\uploads\Cheeseburger.jpg'
            ],
            [
                'name' => 'Lasagne al forno',
                'description' => 'Uno strato di pasta all’uovo intercalato con ragù di carne, besciamella e formaggio.',
                'price' => 14.00,
                'availability' => true,
                'image' => '\uploads\lasagne.jpg'
            ],
            [
                'name' => 'Tagliatelle ai funghi porcini',
                'description' => 'Pasta fresca con funghi porcini, aglio, prezzemolo e olio d’oliva.',
                'price' => 12.50,
                'availability' => true,
                'image' => '\uploads\tagliatelle_funghi.jpg'
            ],
            [
                'name' => 'Osso buco alla milanese',
                'description' => 'Fettine di vitello brasate con pomodoro, vino bianco, sedano, carota e cipolla.',
                'price' => 18.00,
                'availability' => true,
                'image' => '\uploads\osso-buco.jpg'
            ],
            [
                'name' => 'Risotto ai frutti di mare',
                'description' => 'Risotto cremoso con gamberi, calamari, cozze e vongole.',
                'price' => 16.00,
                'availability' => true,
                'image' => '\uploads\risotto-de-marisco-frutti-di-mare.jpg'
            ],
            [
                'name' => 'Insalata Caprese',
                'description' => 'Insalata fresca con pomodori, mozzarella di bufala, basilico e olio d’oliva.',
                'price' => 8.00,
                'availability' => true,
                'image' => '\uploads\caprese.jpg'
            ],
            [
                'name' => 'Cotoletta alla milanese',
                'description' => 'Fettina di carne impanata e fritta, tipica della cucina lombarda.',
                'price' => 15.00,
                'availability' => true,
                'image' => '\uploads\cotoletta-milanese.jpg'
            ],

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
            switch ($new_dishes->name) {
                case 'Pizza Margherita':
                    $new_dishes->restaurant_id = 2;
                    break;
                case 'Insalata Caesar':
                    $new_dishes->restaurant_id = 5;
                    break;
                case 'Spaghetti alla Carbonara':
                    $new_dishes->restaurant_id = 1;
                    break;
                case 'Tiramisù':
                    $new_dishes->restaurant_id = 1;
                    break;
                case 'Minestrone':
                    $new_dishes->restaurant_id = 6;
                    break;
                case 'kebab classico':
                    $new_dishes->restaurant_id = 11;
                    break;
                case 'Bistecca alla Fiorentina':
                    $new_dishes->restaurant_id = 9;
                    break;
                case 'Salmone al Forno':
                    $new_dishes->restaurant_id = 7;
                    break;
                case 'Sushi Misto':
                    $new_dishes->restaurant_id = 10;
                    break;
                case 'Insalata di Quinoa':
                    $new_dishes->restaurant_id = 6;
                    break;
                case 'Tacos di Pollo':
                    $new_dishes->restaurant_id = 8;
                    break;
                case 'Cheeseburger':
                    $new_dishes->restaurant_id = 4;
                    break;
                case 'Lasagne al forno':
                    $new_dishes->restaurant_id = 3;
                    break;
                case 'Tagliatelle ai funghi porcini':
                    $new_dishes->restaurant_id = 3;
                    break;
                case 'Osso buco alla milanese':
                    $new_dishes->restaurant_id = 9;
                    break;
                case 'Risotto ai frutti di mare':
                    $new_dishes->restaurant_id = 7;
                    break;
                case 'Insalata Caprese':
                    $new_dishes->restaurant_id = 6;
                    break;
                case 'Cotoletta alla milanese':
                    $new_dishes->restaurant_id = 5;
                    break;

            }

            $new_dishes->save();
        }

       
    }
}
