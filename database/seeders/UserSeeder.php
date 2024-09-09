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
        $user1 = [
            'name' => 'ERICK GERMAN RIASCOS MORENO',
            'email' => 'egriascos@espe.edu.ec',
            'password' => Hash::make('12345678'),
        ];
        $user2 = [
            'name' => 'DEYVID ANDRES IBARRA BASANTES',
            'email' => 'daibarra@espe.edu.ec',
            'password' => Hash::make('12345678'),
        ];
        $user3 = [
            'name' => 'ROSA LUCRECIA MORENO JAYA',
            'email' => 'rlmoreno@espe.edu.ec',
            'password' => Hash::make('12345678'),
        ];
        User::create($user1)->assignRole('Admin');
        User::create($user2)->assignRole('CriteriaR');
        User::create($user3)->assignRole('IndicatorR');
    }
}
