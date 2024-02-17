<?php
namespace Ecommerce;

namespace Tests\Ecommerce;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;
use function Http\Response\send;

require '../vendor/autoload.php'; // acces a la racine/vendor/autoload.php

$app = new \Ecommerce\App([

]);

$response = $app->run(ServerRequest::fromGlobals());
send($response);
