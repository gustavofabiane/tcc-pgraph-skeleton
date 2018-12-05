<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use RedBeanPHP\R;
use Pgraph\GraphQL\Query;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;

use function Pgraph\GraphQL\type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use function Pgraph\GraphQL\argument;

/**
 * Authors query definition.
 * 
 * Representation of a GraphQL root query field.
 */
class Authors extends Query
{
    /**
     * Describes the query.
     *
     * @var string       
     */
    public $description = 'Lists all authors';

    /**
     * The query return type.
     *
     * @return Type
     */
    public function type(): Type
    {
        return nonNull(listOf($this->registry->type('author')));
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
        $perPage = $args['perPage'];
        $offset = $args['page'] == 1 ? 0 : ($perPage * ($args['page']-1));
        
        return R::findAll('author', 'LIMIT ?, ?', [$offset, $perPage]);
    }
}
