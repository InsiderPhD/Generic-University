<?php

namespace App\GraphQL\Queries;

use App\UniClass;


class ClassQuery extends GenericQuery
{

    protected $attributes = [
        'name' => 'class',
        'type' => 'UniClass',
        'class' => UniClass::class,
    ];

}
