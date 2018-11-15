<?php

namespace Tests;

use Framework\Http\Uri;
use Framework\Http\Request;
use Framework\Core\Application;
use PHPUnit\Framework\TestCase as Test;
use Psr\Http\Message\ResponseInterface;
use Framework\Http\Stream;

class TestCase extends Test
{
    /**
     * Application instance for tests.
     *
     * @var Application
     */
    protected $app;

    /**
     * Get the case application instance.
     * Application is loaded from the bootstrap file.
     *
     * @return Application
     */
    public function app(): Application
    {
        return $this->app ?: ($this->app = require __DIR__ . '/../bootstrap.php');
    }

    /**
     * Returns a response object with give status code and body content.
     *
     * @param int $status
     * @param string $body
     * @return ResponseInterface
     */
    public function response(int $status = 200, string $body = ''): ResponseInterface
    {
        $stream = new Stream();
        $stream->write($body);
        $stream->rewind();

        return $this->app()->get('response')
            ->withStatus($status)
            ->withBody($stream);
    }

    /**
     * Perform an HTTP request simulation to application instance.
     *
     * @param string $method
     * @param string $uri
     * @param mixed $body
     * @param array $options
     * @return ResponseInterface
     */
    public function sendRequest(
        string $method,
        string $uri,
        $body = null,
        array $options = []
    ): ResponseInterface {

        $request = new Request(
            $method,
            $options['params'] ?? [],
            Uri::createFromString($path),
            $options['headers'] ?? [],
            $options['cookies'] ?? []
        );

        return $this->app()->handle(
            $request->withParsedBody($body)
                    ->withUploadedFiles($options['uploaded_files'] ?? [])
        );
    }
}
