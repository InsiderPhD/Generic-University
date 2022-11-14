<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ExtraGradesTableSeeder extends Seeder
{
    public function run()
    {
        $user = \App\User::findOrFail(9);
            // add a grade for each user for each class

        foreach (\App\UniClass::all() as $class) {
                $class->users()->save($user);
                $percent = rand(0, 80);
                $grade = new \App\Grade();
                $grade->grade = $percent;
                $grade->comments = "Good job!";

                $grade->user()->associate($user);
                $grade->uniClass()->associate($class);

                $grade->save();

        }
    }
}
