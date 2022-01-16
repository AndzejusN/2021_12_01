<?php
define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH . '/vendor/autoload.php';

(Dotenv\Dotenv::createImmutable(ROOT_PATH))->load();

use App\Classes\GetData;
use App\Classes\SetData;
use Sunrise\Http\Message\ResponseFactory;
use Sunrise\Http\Router\RequestHandler\CallableRequestHandler;
use Sunrise\Http\Router\RouteCollector;
use Sunrise\Http\Router\Router;
use Sunrise\Http\ServerRequest\ServerRequestFactory;
use function Sunrise\Http\Router\emit;

$collector = new RouteCollector();
$collector->get('home', '/', new CallableRequestHandler(function ($request) {
    return (new ResponseFactory)->createJsonResponse(200, [
        'status' => 'ok',
    ]);
}));

$collector->get('check_order', '/order/{id<\d+>}', new CallableRequestHandler(function ($request) {

    $id = $request->getAttribute('id');

    try {
        $response = (new GetData)->getOrderById($id);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    return (new ResponseFactory)->createJsonResponse(200, $response);

}));

$collector->post('place_order', '/order', new CallableRequestHandler(function ($request) {

    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    $orderId = (new SetData)->setOrderId();
    $response = (new SetData)->setOrderById($orderId, $data);

    return (new ResponseFactory)->createJsonResponse(200, $response);
}));

$collector->delete('delete_order', '/order', new CallableRequestHandler(function ($request) {

    return (new ResponseFactory)->createJsonResponse(200, [
        'id' => $request->setAttribute(is_int('id')),
    ]);
}));


$router = new Router();
$router->addRoute(...$collector->getCollection()->all());
$request = ServerRequestFactory::fromGlobals();
$response = $router->handle($request);
emit($response);