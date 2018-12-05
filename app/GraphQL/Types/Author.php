<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use RedBeanPHP\R;
use Pgraph\GraphQL\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

use function Pgraph\GraphQL\type;
use function Pgraph\GraphQL\listOf;
use function Pgraph\GraphQL\nonNull;
use function Pgraph\GraphQL\argument;

/**
 * Author type definition.
 * 
 * Representation of the GraphQL object type.
 */
class Author extends ObjectType
{
    /**
     * Describes the type.
     *
     * @var string       
     */
    public $description = 'About Author type';

    /**
     * The type fields.
     *
     * @return array of FieldDefinition
     */
    public function fields(): array
    {
        return [
            'id'    => nonNull($this->registry->id()),
            'name'  => nonNull(type('string')),
            'email' => nonNull(type('email')),
            // 'posts' => nonNull(listOf('post'))
        ];
    }

    /**
     * Resolve posts field.
     *
     * @param Author $author
     * @param array $args
     * @param mixed $context
     * @param ResolveInfo $info
     * @return void
     */
    public function getPosts($author, $args = [], $context = null, ResolveInfo $info)
    {
        return R::findAll('post', 'author_id = ?', [$author->id]);
    }

    /**
     * Interfaces implemented by this type.
     *
     * @return array of InterfaceType
     */
    public function implements(): array
    {
        return [
            // $this->registry->type('StubInterface')       
        ];
    }
}
