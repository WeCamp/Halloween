<?php
namespace Halloween\TrickOrTreat\App\Action;

use Halloween\TrickOrTreat\App\ImageFixture;
use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;
use Halloween\TrickOrTreat\Domain\Game\Command\InitialiseGame as Command;

final class InitialiseGame
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        try {
            $gameId = GameId::generate();
            $json = json_decode($request->getBody());
            $command = Command::withPlayers($gameId, $json->playerOne, $json->playerTwo);
            $this->commandBus->dispatch($command);
            return new JsonResponse(
                [
                    'gameId' => $gameId->toString(),
                    'playerOne' => $json->playerOne,
                    'playerTwo' => $json->playerTwo,
                    'ingredients' => ImageFixture::get(9),
                ]
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                ['error' => $e->getMessage()],
                500
            );
        }
    }
}
