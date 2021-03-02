<?php
namespace App\GraphQL\Types;

use App\GraphQL\Utilities;
use App\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\StringType;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Schema;
use Rebing\GraphQL\Support\Type as GraphQLType;

class GenericType extends \Rebing\GraphQL\Support\Type
{
    protected $attributes = [
        'name'          => 'Generic',
        'description'   => 'A generic class',
        'model'         => null,
    ];


    public function fields(): array
    {
        $columns = Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns(app($this->attributes['model'])->getTable());

        $return = [];
        foreach ($columns as $column)
        {
            // hide all _ids
            if (!strpos($column->getName(), '_id')) {

                $type = Utilities::DoctrineToGQL($column);

                $return += [$column->getName() => ['type' => $type]];
            }
        }

        return $return;
    }
}
