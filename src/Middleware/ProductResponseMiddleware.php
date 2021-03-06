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

class ProductResponseMiddleware implements MiddlewareInterface
{

    /**
     * @var TemplatePsrResponseGeneratorInterface
     */
    private $responseGenerator;

    /**
     * @var ProductCategoriesRepositoryInterface
     */
    private $categoriesRepository;

    public function __construct(TemplatePsrResponseGeneratorInterface $responseGenerator, ProductCategoriesRepositoryInterface $categoriesRepository)
    {
        $this->responseGenerator = $responseGenerator;
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * {@inheritdoc}
     *
     * @throws TemplateResponseGeneratorException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->responseGenerator->generate(
            'products/index.html.twig',
            [
                'productCategories' => $this->categoriesRepository->getFeatured()
            ]
        );
    }
}
