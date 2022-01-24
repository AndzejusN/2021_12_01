<?php

define('ROOT_PATH', dirname(__DIR__));
require_once '../vendor/autoload.php';

(Dotenv\Dotenv::createImmutable(ROOT_PATH))->load();


use Sunrise\Http\Message\ResponseFactory;
use Sunrise\Http\Router\RequestHandler\CallableRequestHandler;
use Sunrise\Http\Router\RouteCollector;
use Sunrise\Http\Router\Router;
use Sunrise\Http\ServerRequest\ServerRequestFactory;
use App\Controller\HomeController as HomeRequestHandler;
use function Sunrise\Http\Router\emit;


$collector = new RouteCollector();

$collector->get('home', '/', new CallableRequestHandler(function () {
    require_once ROOT_PATH . '/views/index.html';
    return (new ResponseFactory)->createResponse(200);
}));


//$collector->get('home', '/', [HomeRequestHandler::class, 'index']);

//$collector->get('home', '/', [HomeRequestHandler::class, 'index']);

//$collector->get('home', '/', new HomeRequestHandler())

//$collector->get('index', '/', new CallableRequestHandler(function ($request) {
//
//$apiData = include('../views/index.html');
//    return (new ResponseFactory)->createHtmlResponse(200,'../views/index.html');
//}));


$collector->get('places', '/weather/places', new CallableRequestHandler(function () {
    $apiData = file_get_contents("https://api.meteo.lt/v1/places");
    return (new ResponseFactory)->createJsonResponse(200, $apiData);
}));


//$collector->get('places by city', '/weather/places/{id}', new CallableRequestHandler(function ($request) {
//    $city = $request->getAttribute('id');
//    $apiData = file_get_contents("https://api.meteo.lt/v1/places/" . $city);
//    return (new ResponseFactory)->createJsonResponse(200, $apiData);
//}));
//
//$collector->get('places by city long term', '/weather/long-term/{places}', new CallableRequestHandler(function ($request) {
//    $city = $request->getAttribute('places');
//    $apiData = file_get_contents("https://api.meteo.lt/v1/places/" . $city . "/forecasts/long-term");
//    return (new ResponseFactory)->createJsonResponse(200, $apiData);
//}));

$router = new Router();
$router->addRoute(...$collector->getCollection()->all());
$request = ServerRequestFactory::fromGlobals();
$response = $router->handle($request);
emit($response);