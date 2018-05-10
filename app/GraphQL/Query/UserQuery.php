<?php
namespace App\GraphQL\Query;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;
class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'A User query'
    ];
    public function type()
    {
        return GraphQL::type('User'); //If error put: UserType
    }
    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }
    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return User::find($args['id']);
    }
}