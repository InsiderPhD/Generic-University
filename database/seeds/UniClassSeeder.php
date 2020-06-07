<?php

use Illuminate\Database\Seeder;

class UniClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = collect([
            'Dynamics',
            'Aerospace Propulsion Systems',
            'Theory and Applications of Turbulence',
            'Aerospace Propulsion Systems',
            'Fluid Mechanics',
        ]);

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++)
        {
            $class = new \App\UniClass();
            $class->name = $classes->get($i);
            $class->description = $faker->bs;
            $role = \App\Role::where("name" , "=", "Teacher")->first();
            $class->teacher()->associate(\App\User::where('role_id', '=', $role->id)->first());
            $class->save();

            // stop the teacher and it guy beign added

            $studentRole = \App\Role::where("name" , "=", "Student")->first();
            $class->users()->saveMany(\App\User::where('role_id', '=', $studentRole->id)->get());
            $class->save();
        }
    }
}
