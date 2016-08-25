<?php
namespace Halloween\TrickOrTreat\App\Action;

use Halloween\TrickOrTreat\Domain\Ingredient\Command\AddIngredient;
use Halloween\TrickOrTreat\Domain\Ingredient\IngredientId;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

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
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param callable          $next
     *
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        var_dump('body: ', $request->getBody());
        exit;


        $this->commandBus->dispatch(\Halloween\TrickOrTreat\Domain\Game\Command\FinishRound::withPlayers());

        return new HtmlResponse(
            'Hello WeCamp'
        );
    }
}
