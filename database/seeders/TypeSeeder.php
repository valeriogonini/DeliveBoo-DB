<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\DB;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'label'=>'Italiano',
                'image'=>'../img_icons/spaguetti.png'
            ], 
            [
                'label'=>'Fast-food',
                'image'=>'../img_icons/fast-food.png'
            ], 
            [
                'label'=>'Pesce',
                'image'=>'../img_icons/fish-and-chips.png'
            ], 
            [
                'label'=>'Carne',
                'image'=>'../img_icons/meat.png'
            ], 
            [
                'label'=>'Vegetariano',
                'image'=>'../img_icons/salad.png'
            ], 
            [
                'label'=>'Pizza',
                'image'=>'../img_icons/pizza.png'
            ], 
            [
                'label'=>'Messicano',
                'image'=>'../img_icons/taco.png'
            ], 
            [
                'label'=>'Giapponese',
                'image'=>'../img_icons/sushi.png'
            ], 
            [
                'label'=>'Gluten free',
                'image'=>'../img_icons/gluten-free.png'
            ], 
            [
                'label'=>'Kebab',
                'image'=>'../img_icons/kebab.png'
            ], 
        
        
        ];

        //  DB::table('types')->truncate();

        foreach($types as $type){
        //  $new_type = new Type();
        //  $new_type->label = $type['label'];
        //  $new_type->label = $type['image'];
        //  $new_type->save();
        
        Type::create($type);
        }
    }
}
