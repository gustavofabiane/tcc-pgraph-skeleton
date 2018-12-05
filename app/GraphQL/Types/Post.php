<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Pgraph\GraphQL\InterfaceType;
use GraphQL\Type\Definition\ResolveInfo;

use function Pgraph\GraphQL\type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use function Pgraph\GraphQL\argument;

/**
 * Post type definition.
 * 
 * Representation of the GraphQL interface type.
 */
class Post extends InterfaceType
{
    /**
     * Describes the interface type.
     *
     * @var string       
     */
    public $description = 'About Post type';
    
    /**
     * The type fields.
     *
     * @return array of FieldDefinition with no resolvers
     */
    public function fields(): array
    {
        return [
            'id'        => nonNull('id'),
            'title'     => nonNull('string'),
            'author'    => nonNull('author'),
            'createdAt' => $this->registry->type('datetime')
        ];
    }

    /**
     * Resolve the field type that must be resolved for the given $obj value.
     * 
     * @var mixed $obj
     * @var mixed $context
     * @var ResolveInfo $info
     * @return \GraphQL\Type\Definition\Type
     */
    public function resolveType($obj, $context, ResolveInfo $info)
    {
        return type($obj->getMeta('type'));
    }
}
