<?php


namespace App\GraphQL\Mutations;


use App\Grade;
use App\User;

class GradeMutation extends GenericMutation
{

    protected $attributes = [
        'name' => 'gradeMutation',
        'type' => 'Grade',
        'class' => Grade::class,
    ];


}
