<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleuser1 = DB::table('roles_users')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        $roleuser2 = DB::table('roles_users')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);
    }
}
