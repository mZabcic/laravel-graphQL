<?php
namespace App\GraphQL\Type;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
class PostType extends BaseType
{
    protected $attributes = [
        'name' => 'Post',
        'description' => 'A type'
    ];
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'text' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
            'updated_at' => [
                'type' => Type::string(),
            ]
        ];
    }
}