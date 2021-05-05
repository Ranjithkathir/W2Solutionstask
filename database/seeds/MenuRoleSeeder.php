<?php

use Illuminate\Database\Seeder;

class MenuRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboard1 = DB::table('menus_roles')->insert([
            'menu_id' => 1,
            'role_id' => 1,
        ]);

        $dashboard2 = DB::table('menus_roles')->insert([
            'menu_id' => 1,
            'role_id' => 2,
        ]);

        $users = DB::table('menus_roles')->insert([
            'menu_id' => 2,
            'role_id' => 1,
        ]);

        $users = DB::table('menus_roles')->insert([
            'menu_id' => 3,
            'role_id' => 1,
        ]);
    }
}
