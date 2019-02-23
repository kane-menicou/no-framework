<?php

declare(strict_types=1);

namespace Tests\Templating;

use App\Templating\TwigTemplatingEngine;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Twig\Environment;

class TwigTemplatingEngineTest extends TestCase
{

    /**
     * @var Environment|MockObject
     */
    private $twig;

    /**
     * @var TwigTemplatingEngine
     */
    private $engine;

    protected function setUp(): void
    {
        $this->twig = $this
            ->getMockBuilder(Environment::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->engine = new TwigTemplatingEngine($this->twig);
    }

    /**
     * @test
     *
     * @expectedException \App\Exception\TemplatingEngineException
     * @expectedExceptionMessage Some error
     */
    public function it_will_throw_an_exception_on_twig_error(): void
    {
        $this->twig
            ->expects(static::once())
            ->method('render')
            ->with(
                'some/template.html.twig',
                [
                    'some' => 'var'
                ]
            )
            ->willThrowException(new \Twig_Error('Some error'))
        ;

        $this->engine->render('some/template.html.twig', ['some' => 'var']);
    }

    /**
     * @test
     *
     * @throws \Exception
     */
    public function it_will_return_the_result_of_the_template_render(): void
    {
        $this->twig
            ->expects(static::once())
            ->method('render')
            ->with(
                'some/template.html.twig',
                [
                    'some' => 'var'
                ]
            )
            ->willReturn('Some result')
        ;

        $result = $this->engine->render('some/template.html.twig', ['some' => 'var']);

        static::assertSame('Some result', $result);
    }
}
