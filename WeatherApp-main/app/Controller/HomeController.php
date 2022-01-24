<?php

namespace App\Controller;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class HomeController
{
   abstract function index(ServerRequestInterface $request): ResponseInterface
    {
        return require_once ROOT_PATH . '/views/index.html';


    }
}