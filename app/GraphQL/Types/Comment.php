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
use RedBeanPHP\OODBBean;

/**
 * Comment type definition.
 * 
 * Representation of the GraphQL object type.
 */
class Comment extends ObjectType
{
    /**
     * Describes the type.
     *
     * @var string       
     */
    public $description = 'About Comment type';

    /**
     * The type fields.
     *
     * @return array of FieldDefinition
     */
    public function fields(): array
    {
        return [
            'id'        => nonNull('id'),
            'content'   => nonNull('string'),
            'email'     => nonNull('email'),
            'replies'   => listOf('comment'), 
            'parent'    => type('comment'),
            'createdAt' => type('datetime')
        ];
    }

    public function getReplies($comment): array
    {
        return R::findAll('comment', 'parent_id = ?', [$comment->id]);
    }

    public function getParent($comment)
    {
        return $comment->parentId 
            ? R::findOne('comment', 'id = ?', [$comment->parentId])
            : null;
    }

    /**
     * Interfaces implemented by this type.
     *
     * @return array of InterfaceType
     */
    public function implements(): array
    {
        return [];
    }
}
