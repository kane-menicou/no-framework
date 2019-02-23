<?php

declare(strict_types=1);

use App\App;
use Narrowspark\HttpEmitter\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

require_once '../vendor/autoload.php';

$response = (new App(true))->handle(ServerRequestFactory::fromGlobals());

(new SapiEmitter())->emit($response);
