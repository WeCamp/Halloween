<?php
namespace Halloween\TrickOrTreat\App\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

final class ConfirmDidNotFinishedDish
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
                ['ingredientId' => 'XXX', 'name' => 'pepper'],
                ['ingredientId' => 'YYY', 'name' => 'salt'],
            ]
        );
    }
}
