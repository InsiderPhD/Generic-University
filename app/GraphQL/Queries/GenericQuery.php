<?php

namespace App\GraphQL\Queries;

use App\GraphQL\Utilities;
use Closure;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\TextType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\StringType;
use Illuminate\Support\Facades\Schema;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class GenericQuery extends Query
{
    protected $attributes = [
        'name' => 'generic',
        'type' => 'Generic',
        'class' => null,
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type($this->attributes['type']));
    }

    public function args(): array
    {
        $columns = Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns(app($this->attributes['class'])->getTable());

        //$table = Schema::getColumnListing((new User)->getTable());

        $return = [];
        foreach ($columns as $column)
        {

            if (!strpos($column->getName(), '_id')) {
                $type = Utilities::DoctrineToGQL($column);

                $return += [$column->getName() => ['name' => $column->getName(), 'type' => $type]];
            }
        }

        //dd($return);
        return $return;
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        foreach ($args as $k=>$value)
        {
            return $this->attributes['class']::where($k, $value)->get();
        }


        return $this->attributes['class']::all();
    }
}
