<?php
namespace Halloween\TrickOrTreat\App\Action;

use Halloween\TrickOrTreat\App\ImageFixture;
use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;
use Halloween\TrickOrTreat\Domain\Game\Command\InitialiseGame as Command;

final class GetAvailableIngredients
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
                'ingredients' => ImageFixture::get(9),
            ]
        );
    }
}
