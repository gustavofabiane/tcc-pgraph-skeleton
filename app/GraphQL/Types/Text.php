<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use RedBeanPHP\R;
use Pgraph\GraphQL\ObjectType;

use function Pgraph\GraphQL\type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use function Pgraph\GraphQL\argument;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Text type definition.
 * 
 * Representation of the GraphQL object type.
 */
class Text extends ObjectType
{
    /**
     * Describes the type.
     *
     * @var string       
     */
    public $description = 'About Text type';

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
            'content'   => nonNull('string'),
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
