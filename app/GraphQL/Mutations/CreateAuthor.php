<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use RedBeanPHP\R;
use Pgraph\GraphQL\Mutation;
use function Pgraph\GraphQL\type;

use GraphQL\Type\Definition\Type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use function Pgraph\GraphQL\argument;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * CreateAuthor mutation definition.
 * 
 * Representation of a GraphQL root mutation field.
 */
class CreateAuthor extends Mutation
{
    /**
     * Describes the mutation.
     *
     * @var string       
     */
    public $description = 'About CreateAuthor mutation';

    /**
     * The mutation return type.
     *
     * @return Type
     */
    public function type(): Type
    {
        return $this->registry->type('author');
    }

    /**
     * The mutation arguments.
     *
     * @return array
     */
    public function args(): array
    {
        return [
            argument('name', nonNull('string')),
            argument('email', nonNull('email')),
            argument('password', nonNull('string'))
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
        $author = R::dispense('author');
        $author->name = $args['name'];
        $author->email = $args['email'];
        $author->password = password_hash($args['password'], PASSWORD_BCRYPT);
        R::store($author);

        return $author;
    }
}
