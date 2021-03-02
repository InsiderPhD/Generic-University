<?php


namespace App\GraphQL\Mutations;


use App\GraphQL\Types\GenericType;
use App\GraphQL\Utilities;
use App\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Schema;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class GenericMutation extends Mutation
{
    protected $attributes = [
        'name' => 'genericMutation',
        'type' => 'Generic',
        'class' => null,
    ];

    public function type(): Type
    {
        return GraphQL::type($this->attributes['type']);
    }

    public function args(): array
    {
        $columns = Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns(app($this->attributes['class'])->getTable());
        $return = [];
        foreach ($columns as $column)
        {

            $type = Utilities::DoctrineToGQL($column);

            $return += [$column->getName() => ['name' => $column->getName(), 'type' =>  $type]];
        }

        return $return;
    }

    protected function rules(array $args = []): array
    {
        return [
            'id' => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $model = app($this->attributes['class'])->find($args["id"]);
        if ($model) {
            $model->update($args);
        } else {
            return null;
        }

        return $model;
    }
}
