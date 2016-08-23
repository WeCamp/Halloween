<?php
namespace App\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

final class Home
{
//    /**
//     * @var TemplateRendererInterface
//     */
//    private $templates;
//
//    /**
//     * @param TemplateRendererInterface $templates
//     */
//    public function __construct(TemplateRendererInterface $templates)
//    {
//        $this->templates = $templates;
//    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        return new HtmlResponse(
            'Hello WeCamp'
        );
    }
}
