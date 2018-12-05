<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use RedBeanPHP\R;
use Pgraph\GraphQL\Mutation;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;

use function Pgraph\GraphQL\type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use function Pgraph\GraphQL\argument;

/**
 * CreateImagePost mutation definition.
 * 
 * Representation of a GraphQL root mutation field.
 */
class CreateImagePost extends Mutation
{
    /**
     * Describes the mutation.
     *
     * @var string       
     */
    public $description = 'About CreateImagePost mutation';

    /**
     * The mutation return type.
     *
     * @return Type
     */
    public function type(): Type
    {
        return $this->registry->type('image');
    }

    /**
     * The mutation arguments.
     *
     * @return void
     */
    public function args(): array
    {
        return [
            argument('title', nonNull('string')),
            argument('url', nonNull('string')),
            argument('authorId', nonNull('id'))
        ];
    }

    /**
     * Resolves mutation call.
     * 
     * @param mixed $root
     * @param array $args
     * @param mixed $context
     * @param ResolveInfo $info
     * @return mixed
     */
    public function resolve($root, array $args = [], $context = null, ResolveInfo $info = null)
    {
        $image = R::dispense('image');
        $image->title = $args['title'];
        $image->url = $args['url'];
        $image->author = R::findOne('author', $args['authorId']);
        $image->createdAt = new \DateTime('now');
        R::store($image);

        return $image;
    }
}
