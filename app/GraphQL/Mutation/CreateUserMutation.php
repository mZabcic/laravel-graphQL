<?php
namespace App\GraphQL\Mutation;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;
class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateUserMutation',
        'description' => 'A mutation to create User'
    ];
     public function type()
    {
        return GraphQL::type('User'); //If error put: UserType
    }
    public function args()
    {
        return [
            'first_name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['email', 'unique:users']
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['min:4']
            ]
        ];
    }
    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = new User();
        $user->fill($args);
        $user->save();
        return $user;
    }
}