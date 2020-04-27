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
            $class->teacher()->associate(\App\User::find(7));
            $class->save();

            // stop the teacher and it guy beign added
            $class->users()->saveMany(\App\User::where('id', '<', 6)->get());
            $class->save();
        }
    }
}
