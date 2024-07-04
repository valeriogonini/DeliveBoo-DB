<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Type;

class RestaurantypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Recupera i ristoranti
       $restaurantA = Restaurant::where('name', 'Da Mimmo')->first();
       $restaurantB = Restaurant::where('name', 'Da Pippo')->first();
       $restaurantC = Restaurant::where('name', 'Da Gennaro')->first();
       $restaurantD = Restaurant::where('name', 'Da Cosimo')->first();
       $restaurantE = Restaurant::where('name', 'Da Pietro')->first();
       $restaurantF = Restaurant::where('name', 'Da Luigi')->first();
       $restaurantG = Restaurant::where('name', 'Da Giulio')->first();
       $restaurantH = Restaurant::where('name', 'Da Nicola')->first();
       $restaurantI = Restaurant::where('name', 'Konnichiwa')->first();
       $restaurantL = Restaurant::where('name', 'Kebab Campus')->first();
       $restaurantM = Restaurant::where('name', 'Burger King')->first();
       // Recupera i tipi
       $italian = Type::where('label', 'Italiano')->first();
       $mexican = Type::where('label', 'Messicano')->first();
       $fast_food = Type::where('label', 'Fast-food')->first();
       $japanese = Type::where('label', 'Giapponese')->first();
       $fish = Type::where('label', 'Pesce')->first();
       $meat = Type::where('label', 'Carne')->first();
       $vegetarian = Type::where('label', 'Vegetariano')->first();
       $pizza = Type::where('label', 'Pizza')->first();
       $gluten = Type::where('label', 'Gluten free')->first();
       $kebab = Type::where('label', 'Kebab')->first();

       // Assegna i tipi ai ristoranti
       $restaurantA->types()->attach([$italian->id,$meat->id]);
       $restaurantB->types()->attach([$gluten->id,$italian->id,$pizza->id]);
       $restaurantC->types()->attach([$fast_food->id]);
       $restaurantD->types()->attach([$fish->id]);
       $restaurantE->types()->attach([$vegetarian->id]);
       $restaurantF->types()->attach([$pizza->id,$italian->id]);
       $restaurantG->types()->attach([$mexican->id,$meat->id]);
       $restaurantH->types()->attach([$fast_food->id]);
       $restaurantI->types()->attach([$japanese->id,$fish->id]);
       $restaurantL->types()->attach([$kebab->id,$meat->id]);
       $restaurantM->types()->attach([$meat->id]);
   }


    }

