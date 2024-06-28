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
                'label'=>'italiano',
                'image'=>'../img_icons/spaguetti.png'
            ], 
            [
                'label'=>'fast-food',
                'image'=>'../img_icons/fast-food.png'
            ], 
            [
                'label'=>'pesce',
                'image'=>'../img_icons/fish-and-chips.png'
            ], 
            [
                'label'=>'carne',
                'image'=>'../img_icons/meat.png'
            ], 
            [
                'label'=>'vegetariano',
                'image'=>'../img_icons/salad.png'
            ], 
            [
                'label'=>'pizza',
                'image'=>'../img_icons/pizza.png'
            ], 
            [
                'label'=>'messicano',
                'image'=>'../img_icons/taco.png'
            ], 
            [
                'label'=>'giapponese',
                'image'=>'../img_icons/sushi.png'
            ], 
            [
                'label'=>'gluten free',
                'image'=>'../img_icons/gluten-free.png'
            ], 
            [
                'label'=>'kebab',
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
