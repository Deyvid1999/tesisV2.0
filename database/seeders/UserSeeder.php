<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Marco Guevara',
                'email' => 'marco.guevara@upacifico.edu.ec',
                'password' => Hash::make('Marco.2023'),
            ],
            [
                'name' => 'andres',
                'email' => 'andres.valarezo@upacifico.edu.ec',
                'password' => Hash::make('agvc2001')
            ],
            [
                'name' => 'Luis',
                'email' => 'luis.vasquez@upacifico.edu.ec',
                'password' => '$2y$10$A8RdNDOgFTXgF6wnZ65vGOvdhPO9KFCINF6T2ZrWnpfZfIyOANayO'
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
