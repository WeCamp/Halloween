<?php
namespace Halloween\TrickOrTreat\App\Action;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

final class FinishRound
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     *
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        $json = json_decode($request->getBody());

        $this->commandBus->dispatch(
            \Halloween\TrickOrTreat\Domain\Game\Command\FinishRound::withPlayers(
                GameId::fromString($json->gameId),
                $json->playerOneResult,
                $json->playerTwoResult
            )
        );

        return new JsonResponse('', 202);
    }
}
