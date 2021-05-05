<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $adminuser = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'mobilenumber' => '7894561231',
            'password' => Hash::make('test123'),
            'role_id' => 1
        ]);

        $hruser = User::create([
            'name' => 'Human Resource',
            'email' => 'user@user.com',
            'mobilenumber' => '7894561232',
            'password' => Hash::make('test123'),
            'role_id' => 2
        ]);
    }
}
