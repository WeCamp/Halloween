<?php
namespace Halloween\TrickOrTreat\App\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

final class SignIn
{

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        return new JsonResponse(
            [
                'Players' => [
                    'player_1' => 'Foo',
                    'player_2' => 'Bar',
                ],
                'Game' => ['round' => 1]
            ]
        );
    }
}
