<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Exception\TemplateResponseGeneratorException;
use App\Model\ProductCategoriesRepositoryInterface;
use App\Model\TemplatePsrResponseGeneratorInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ProductCategoriesResponseMiddleware implements MiddlewareInterface
{

    /**
     * @var TemplatePsrResponseGeneratorInterface
     */
    private $responseGenerator;

    /**
     * @var ProductCategoriesRepositoryInterface
     */
    private $repository;

    public function __construct(
        TemplatePsrResponseGeneratorInterface $responseGenerator,
        ProductCategoriesRepositoryInterface $repository
    ) {
        $this->responseGenerator = $responseGenerator;
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     *
     * @throws TemplateResponseGeneratorException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->responseGenerator->generate(
            'productCategories/index.html.twig',
            [
                'productCategories' => $this->repository->getAll()
            ]
        );
    }
}
