<?php
namespace Halloween\TrickOrTreat\App\Action;

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
                    'ingredients' => $this->listIngredients()
                ]
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                ['error' => $e->getMessage()]
            );
        }
    }

    private function listIngredients()
    {
        return [
            [
                'id' => 1,
                'name' => 'spider',
                'picture' => 'picturelocation_1'
            ],
            [
                'id' => 2,
                'name' => 'eyeball',
                'picture' => 'picturelocation_2'
            ],
            [
                'id' => 2,
                'name' => 'scorpion',
                'picture' => 'picturelocation_3'
            ]
        ];
    }
}
