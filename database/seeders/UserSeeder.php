<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $user = [
            [
                'name' => 'iyoy',
                'email' => 'iyoy@gmail.com',
                'no_hp' => '082458777123',
                'username' => 'distributor',
                'password' => Hash::make('distributor'),
                'role' => 'Distributor',
                'foto' => 'Default.jpg'
            ],
            [
                'name' => 'rifki',
                'email' => 'rifki@gmail.com',
                'no_hp' => '082458777123',
                'username' => 'retailer',
                'password' => Hash::make('retailer'),
                'role' => 'Retailer',
                'foto' => 'Default.jpg'
            ],
            [
                'name' => 'Admin Ganteng',
                'email' => 'admin@gmail.com',
                'no_hp' => '082458777123',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'Admin',
                'foto' => 'Default.jpg'
            ],
        ];
        foreach ($user as $user) {
            User::create($user);
        }
    }
}
