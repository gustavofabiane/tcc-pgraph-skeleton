<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Pgraph\GraphQL\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

use function Pgraph\GraphQL\type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use function Pgraph\GraphQL\argument;

/**
 * Image type definition.
 * 
 * Representation of the GraphQL object type.
 */
class Image extends ObjectType
{
    /**
     * Describes the type.
     *
     * @var string       
     */
    public $description = 'About Image type';

    /**
     * The type fields.
     *
     * @return array of FieldDefinition
     */
    public function fields(): array
    {
        return [
            'id'        => nonNull('id'),
            'title'     => nonNull('string'),
            'author'    => nonNull('author'),
            'url'       => nonNull('string'),
            'createdAt' => type('datetime')
        ];
    }

    public function getAuthorField($obj)
    {
        return $obj->author;
    }

    /**
     * Interfaces implemented by this type.
     *
     * @return array of InterfaceType
     */
    public function implements(): array
    {
        return [
            $this->registry->type('post')       
        ];
    }
}
