<?php
namespace Halloween\TrickOrTreat\App\Action;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use Halloween\TrickOrTreat\Infrastructure\Repository\MongodbGameRepository;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

final class GetCurrentGame
{
    /**
     * @var MongodbGameRepository
     */
    private $gameRepository;

    /**
     * @param MongodbGameRepository $gameRepository
     */
    public function __construct(MongodbGameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
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

        $gameId = GameId::fromString($json->gameId);

        $result = $this->gameRepository->getGame($gameId);

        return new JsonResponse($result);
    }
}
