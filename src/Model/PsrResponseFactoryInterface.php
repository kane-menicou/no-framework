<?php

declare(strict_types=1);

namespace App\Model;

use Psr\Http\Message\ResponseInterface;

interface PsrResponseFactoryInterface
{

    /**
     * @return ResponseInterface
     */
    public function createResponse(): ResponseInterface;
}
