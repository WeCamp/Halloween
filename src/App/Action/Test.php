<?php
namespace Halloween\TrickOrTreat\App\Action;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

final class Test
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
        $gameId = GameId::generate();

        try {
            $command = \Halloween\TrickOrTreat\Domain\Game\Command\InitialiseGame::withPlayers(
                $gameId,
                'Mitchel',
                'Marieke'
            );
            $this->commandBus->dispatch($command);

            var_dump(
                [
                    'gameId' => $gameId->toString(),
                    'playerOne' => 'Mitchel',
                    'playerTwo' => 'Marieke',
                    'ingredients' => $this->listIngredients()
                ]
            );
        } catch (\Exception $e) {
            var_dump($e);
            exit;
        }


        try {

            $this->commandBus->dispatch(
                \Halloween\TrickOrTreat\Domain\Game\Command\FinishRound::withPlayers(
                    $gameId,
                    1,
                    0
                )
            );

        } catch (\Exception $e) {
            var_dump($e);
        }

        exit;

        return new JsonResponse('', 202);
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
