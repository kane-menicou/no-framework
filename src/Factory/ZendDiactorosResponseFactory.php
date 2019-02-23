<?php

declare(strict_types=1);

namespace App\Factory;

use App\Model\PsrResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ZendDiactorosResponseFactory implements PsrResponseFactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function createResponse(): ResponseInterface
    {
        return new Response();
    }
}
