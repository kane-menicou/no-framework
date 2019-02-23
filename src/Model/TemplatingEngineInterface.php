<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\TemplatingEngineException;

interface TemplatingEngineInterface
{

    /**
     * @param string $template
     * @param array  $variables
     *
     * @return string
     *
     * @throws TemplatingEngineException
     */
    public function render(string $template, array $variables): string;
}
