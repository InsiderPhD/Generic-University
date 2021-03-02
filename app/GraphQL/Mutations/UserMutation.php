<?php


namespace App\GraphQL\Mutations;


use App\User;

class UserMutation extends GenericMutation
{

    protected $attributes = [
        'name' => 'userMutation',
        'type' => 'User',
        'class' => User::class,
    ];

}
