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
                ['error' => $e->getMessage()],
                500
            );
        }
    }

    private function listIngredients()
    {
        $arr = [];
        for($i=1;$i<=20;++$i){
            $arr[] = [
                'id' => $i,
                'name' => 'spider '.$i,
                'picture' => 'picturelocation_1'
            ];
        }
        return $arr;
    }
}
