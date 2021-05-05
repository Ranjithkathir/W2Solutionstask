<?php

use Illuminate\Database\Seeder;
use App\Menus;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboard = Menus::create([
            'name' => 'Dashboard',
            'slug' => 'dashboard',
            'url' => 'dashboad',
            'icon' => 'fas fa-fw fa-tachometer-alt'
        ]);

        $user = Menus::create([
            'name' => 'Users',
            'slug' => 'users',
            'url' => 'users',
            'icon' => 'fas fa-fw fa-users'
        ]);

        $role = Menus::create([
            'name' => 'Roles',
            'slug' => 'roles',
            'url' => 'roles',
            'icon' => 'fas fa-fw fa-tasks'
        ]);
    }
}
