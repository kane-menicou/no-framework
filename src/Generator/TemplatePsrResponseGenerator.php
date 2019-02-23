<?php

declare(strict_types=1);

namespace App\Generator;

use App\Exception\TemplateResponseGeneratorException;
use App\Exception\TemplatingEngineException;
use App\Model\PsrResponseFactoryInterface;
use App\Model\TemplatePsrResponseGeneratorInterface;
use App\Model\TemplatingEngineInterface;
use Psr\Http\Message\ResponseInterface;

class TemplatePsrResponseGenerator implements TemplatePsrResponseGeneratorInterface
{

    /**
     * @var TemplatingEngineInterface
     */
    private $templatingEngine;

    /**
     * @var PsrResponseFactoryInterface
     */
    private $responseFactory;

    public function __construct(
        TemplatingEngineInterface $templatingEngine,
        PsrResponseFactoryInterface $responseFactory
    ) {
        $this->templatingEngine = $templatingEngine;
        $this->responseFactory = $responseFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function generate(string $template, array $variables): ResponseInterface
    {
        $response = $this->responseFactory->createResponse();

        try {
            $render = $this->templatingEngine->render($template, $variables);
        } catch (TemplatingEngineException $exception) {
            throw new TemplateResponseGeneratorException($exception->getMessage(), 0, $exception);
        }

        $response->getBody()->write($render);

        return $response;
    }
}
