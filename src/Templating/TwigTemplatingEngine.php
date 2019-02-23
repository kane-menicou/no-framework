<?php

declare(strict_types=1);

namespace App\Templating;

use App\Exception\TemplatingEngineException;
use App\Model\TemplatingEngineInterface;
use Twig\Environment;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;

class TwigTemplatingEngine implements TemplatingEngineInterface
{

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function render(string $template, array $variables): string
    {
        try {
            return $this->twig->render($template, $variables);
        } catch (Twig_Error_Loader|Twig_Error_Runtime|Twig_Error_Syntax $exception) {
            throw new TemplatingEngineException($exception->getMessage(), 0, $exception);
        }
    }
}
