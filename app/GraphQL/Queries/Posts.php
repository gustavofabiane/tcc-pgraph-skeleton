<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use RedBeanPHP\R;
use Pgraph\GraphQL\Query;
use function Pgraph\GraphQL\type;

use GraphQL\Type\Definition\Type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Posts query definition.
 * 
 * Representation of a GraphQL root query field.
 */
class Posts extends Query
{
    /**
     * Describes the query.
     *
     * @var string       
     */
    public $description = 'About Posts query';

    /**
     * The query return type.
     *
     * @return Type
     */
    public function type(): Type
    {
        return $this->registry->type('post');
    }

    /**
     * The query arguments.
     *
     * @return array
     */
    public function args(): array
    {
        return [
            argument('page', 'int', 1),
            argument('perPage', 'int', 10)
        ];
    }

    /**
     * Resolves query call.
     * 
     * @param mixed $root
     * @param array $args
     * @param mixed $context
     * @param ResolveInfo $info
     * @return mixed
     */
    public function resolve($root, array $args = [], $context = null, ResolveInfo $info = null)
    {
        // return R::findMulti(['text', 'image'], 'LIMIT ?, ');
    }
}
