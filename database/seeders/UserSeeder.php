<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $users = [
            [
                'name'=>'Mimmo',
                'last_name'=>"D'Agostino",
                'email'=>'Mimmo@gmail.com',
                'password'=>'12345'
            ],
            [
                'name'=>'Mimmo2',
                'last_name'=>"D'Agostino",
                'email'=>'Mimmo2@gmail.com',
                'password'=>'12345'
            ],
            [
                'name'=>'Mimmo3',
                'last_name'=>"D'Agostino",
                'email'=>'Mimmo3@gmail.com',
                'password'=>'12345'
            ]
            ];

            foreach ($users as $user ) {
                
                $new_user = new User();
                $new_user->name=$user['name'];   
                $new_user->last_name=$user['last_name'];  
                $new_user->email=$user['email'];  
                $new_user->password=$user['password'];
                 $new_user->save();
            }
    }
}
