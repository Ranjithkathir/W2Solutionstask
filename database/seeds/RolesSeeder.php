<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Roles::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => json_encode([
                'users' => true,
                'create-user' => true,
                'edit-user' => true,
                'update-user' => true,
                'delete-user' => true,
            ]),
            'description' => 'This is the administrative role of this app.'
        ]);

        $hr = Roles::create([
            'name' => 'Human Resource',
            'slug' => 'hr',
            'description' => 'This is the Human Resource activities of this app.'
        ]);
    }
}
