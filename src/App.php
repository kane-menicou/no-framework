<?php

declare(strict_types=1);

namespace App;

use App\Generator\TemplatePsrResponseGenerator;
use App\Middleware\ErrorHandlerMiddleware;
use App\Middleware\ProductCategoriesResponseMiddleware;
use App\Middleware\ProductResponseMiddleware;
use App\Model\ProductCategoriesRepositoryInterface;
use App\Model\TemplatePsrResponseGeneratorInterface;
use App\Model\TemplatingEngineInterface;
use App\Repository\StubProductCategoriesRepositoryInterface;
use App\Templating\TwigTemplatingEngine;
use DI\ContainerBuilder;
use function DI\get;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Relay\Relay;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Zend\Diactoros\ResponseFactory;

class App implements RequestHandlerInterface
{

    /**
     * @var bool
     */
    private $debug;

    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @throws \Exception
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $container = $this->createContainer();

        $middlewareQueue = [];

        $routes = simpleDispatcher(function (RouteCollector $collector) {
            $this->routes($collector);
        });

        $middlewareQueue[] = $container->get(ErrorHandlerMiddleware::class);
        $middlewareQueue[] = new FastRoute($routes);
        $middlewareQueue[] = new RequestHandler($container);

        $requestHandler = new Relay($middlewareQueue);

        return $requestHandler->handle($request);
    }

    /**
     * @return ContainerInterface
     *
     * @throws \Exception
     */
    private function createContainer(): ContainerInterface
    {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        $twig = new Environment($loader, [
            'cache' => $this->debug ? false : __DIR__ . '/../cache',
            'debug' => $this->debug,
        ]);

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions([
            ResponseFactoryInterface::class              => get(ResponseFactory::class),
            TemplatePsrResponseGeneratorInterface::class => get(TemplatePsrResponseGenerator::class),
            TemplatingEngineInterface::class             => get(TwigTemplatingEngine::class),
            \Twig_Environment::class                     => $twig,
            ProductCategoriesRepositoryInterface::class  => get(StubProductCategoriesRepositoryInterface::class),
        ]);

        return $containerBuilder->build();
    }

    private function routes(RouteCollector $collector): void
    {
        $collector->get('/products', ProductResponseMiddleware::class);
        $collector->get('/product-categories', ProductCategoriesResponseMiddleware::class);
    }
}
