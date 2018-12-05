<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Error\Error;
use GraphQL\Language\AST\Node;
use Pgraph\GraphQL\ScalarType;
use GraphQL\Language\AST\StringValueNode;

/**
 * Email scalar type definition.
 *
 * Representation of the GraphQL scalar type.
 */
class Email extends ScalarType
{
    /**
     * Serializes an internal value to include in a response.
     *
     * @param mixed $value
     * @return string
     */
    public function serialize($value)
    {
        return $value;
    }

    /**
     * Parses an externally provided value (query variable) to use as an input.
     *
     * @param mixed $value
     * @return mixed
     */
    public function parseValue($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new Error(
                'Cannot represent following value as email: ' .
                Utils::printSafeJson($value)
            );
        }
        return $value;
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
        return $this->parseValue($valueNode->value);
    }
}