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
 * CreateTextPost mutation definition.
 * 
 * Representation of a GraphQL root mutation field.
 */
class CreateTextPost extends Mutation
{
    /**
     * Describes the mutation.
     *
     * @var string       
     */
    public $description = 'About CreateTextPost mutation';

    /**
     * The mutation return type.
     *
     * @return Type
     */
    public function type(): Type
    {
        return $this->registry->type('text');
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
            argument('content', nonNull('string')),
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
        $text = R::dispense('text');
        $text->title = $args['title'];
        $text->content = $args['content'];
        $text->author = R::findOne('author', $args['authorId']);
        $text->createdAt = new \DateTime('now');
        R::store($text);

        return $text;
    }
}
