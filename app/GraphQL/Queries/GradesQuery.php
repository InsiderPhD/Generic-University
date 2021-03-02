<?php

namespace App\GraphQL\Queries;

use App\Grade;


class GradesQuery extends GenericQuery
{

    protected $attributes = [
        'name' => 'grades',
        'type' => 'Grade',
        'class' => Grade::class,
    ];

}
