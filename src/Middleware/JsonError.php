<?php

namespace Halloween\TrickOrTreat\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Stratigility\ErrorMiddlewareInterface;

/**
 * Error middleware to handle json requests
 */
class JsonError implements ErrorMiddlewareInterface
{
    /**
     * @interitdoc
     */
    public function __invoke($error, Request $request, Response $response, callable $out = null)
    {
        $contentType = trim($request->getHeaderLine('Content-Type'));

        if (0 === strpos($contentType, 'application/json')) {
            $response = $response->withStatus(500);

            if (getenv('PROOPH_ENV') === 'development') {
                $response->getBody()->write(json_encode(['message' => $error->getMessage(), 'trace' => $error->getTraceAsString()]));
            } else {
                $response->getBody()->write(json_encode(['message' => 'Server Error']));
            }

            return $response;
        }

        if ($out) {
            return $out($request, $response, $error);
        }
    }
}
