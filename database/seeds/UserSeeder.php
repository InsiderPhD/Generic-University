<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++)
        {
            $user = new \App\User();
            $user->name = $faker->firstName . ' ' . $faker->lastName;
            $user->email = $faker->email;
            $user->password = 'password';
            $user->role()->associate(\App\Role::find(2));
            $user->save();
        }


        $user = new \App\User();
        $user->name = 'IT ' . $faker->firstName . ' ' . $faker->lastName;
        $user->email = $faker->email;
        $user->password = 'password';
        $user->role()->associate(\App\Role::find(1));
        $user->save();


        $user = new \App\User();
        $user->name = 'Dr ' . $faker->firstName . ' ' . $faker->lastName;
        $user->email = $faker->email;
        $user->password = 'password';
        $user->role()->associate(\App\Role::find(3));
        $user->save();
    }
}
