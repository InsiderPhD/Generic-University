<?php

use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\User::where('id', '<', 6)->get() as $user)
        {
            // add a grade for each user for each class

            foreach($user->uniClasses as $class)
            {
                $percent = rand(0,80);
                $grade = new \App\Grade();
                $grade->grade = $percent;
                $grade->comments = "Good job!";

                $grade->user()->associate($user);
                $grade->uniClass()->associate($class);

                $grade->save();

            }
        }
    }
}
