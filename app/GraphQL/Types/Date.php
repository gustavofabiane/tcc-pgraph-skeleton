<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Error\Error;
use GraphQL\Language\AST\Node;
use Pgraph\GraphQL\ScalarType;
use GraphQL\Language\AST\StringValueNode;

/**
 * Date scalar type definition.
 *
 * Representation of the GraphQL scalar type.
 */
class Date extends ScalarType
{
    /**
     * Serializes an internal value to include in a response.
     *
     * @param mixed $value
     * @return string
     */
    public function serialize($value)
    {
        return $value instanceof \DateTime 
            ? $value->format('Y-m-d H:i:s') 
            : date('Y-m-d H:i:s', strtotime($value));
    }

    /**
     * Parses an externally provided value (query variable) to use as an input.
     *
     * @param mixed $value
     * @return mixed
     */
    public function parseValue($value)
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $value);
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * @param Node $valueNode
     * @param array $variables
     * @return string
     * @throws \GraphQL\Error\Error
     */
    public function parseLiteral($valueNode, array $variables = null)
    {
        if (!$valueNode instanceof StringValueNode) {
            throw new Error(
                'Query error: Can only parse strings got: ' . 
                $valueNode->kind, [$valueNode]
            );
        }
        return \DateTime::createFromFormat('Y-m-d H:i:s', $valueNode->value);
    }
}