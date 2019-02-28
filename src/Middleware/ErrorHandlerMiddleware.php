<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Exception\TemplateResponseGeneratorException;
use App\Model\TemplatePsrResponseGeneratorInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;

class ErrorHandlerMiddleware implements MiddlewareInterface
{

    /**
     * @var TemplatePsrResponseGeneratorInterface
     */
    private $responseGenerator;

    public function __construct(TemplatePsrResponseGeneratorInterface $responseGenerator)
    {
        $this->responseGenerator = $responseGenerator;
    }

    /**
     * {@inheritdoc}
     *
     * @throws TemplateResponseGeneratorException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (Throwable $throwable) {
            \var_dump($throwable->getMessage());
            $response = $this->responseGenerator
                ->generate('_errors/error500.html.twig', [])
            ;

            return $response->withStatus(500);
        }
    }
}
