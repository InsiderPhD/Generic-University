<?php
namespace App\GraphQL;


use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\TextType;
use GraphQL\Type\Definition\Type;

class Utilities
{
    static function DoctrineToGQL($column) : Type{
        $type = Type::string();
        if($column->getType() instanceof BigIntType)  { $type = Type::int(); }
        if($column->getType() instanceof StringType)  { $type = Type::string(); }
        if($column->getType() instanceof TextType)  { $type = Type::string(); }
        if($column->getType() instanceof DateTimeType)  { $type = Type::string(); }
        if($column->getType() instanceof FloatType)  { $type = Type::float(); }

        return $type;
    }
}
