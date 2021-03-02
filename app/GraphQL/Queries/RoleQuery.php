<?php

namespace App\GraphQL\Queries;

use App\Grade;
use App\Role;


class RoleQuery extends GenericQuery
{

    protected $attributes = [
        'name' => 'roles',
        'type' => 'Role',
        'class' => Role::class,
    ];

}
