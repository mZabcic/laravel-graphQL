<?php
namespace App\GraphQL\Mutation;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;
use App\Post;
class CreatePostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePostMutation',
        'description' => 'A mutation to create Post'
    ];
     public function type()
    {
        return GraphQL::type('Post'); //If error put: UserType
    }
    public function args()
    {
        return [
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'text' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ]
        ];
    }
    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $post = Post::create(['title' => $args['title'],
        'text' => $args['text'],
        'user_id' => $args['user_id']
        ]);
        return $post;
    }
}