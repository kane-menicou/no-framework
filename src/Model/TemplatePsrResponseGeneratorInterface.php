<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\TemplateResponseGeneratorException;
use Psr\Http\Message\ResponseInterface;

interface TemplatePsrResponseGeneratorInterface
{

    /**
     * @param string $template
     * @param array  $variables
     *
     * @return ResponseInterface
     *
     * @throws TemplateResponseGeneratorException
     */
    public function generate(string $template, array $variables): ResponseInterface;
}
