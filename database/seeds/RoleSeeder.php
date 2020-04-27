<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name = 'Admin';
        $role->save();

        $role = new \App\Role();
        $role->name = 'Student';
        $role->save();

        $role = new \App\Role();
        $role->name = 'Teacher';
        $role->save();
    }
}
