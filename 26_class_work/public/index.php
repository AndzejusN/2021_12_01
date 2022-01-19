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

$collector->get('check_order', '/order/{id}', new CallableRequestHandler(function ($request) {

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

$collector->get('delete_order', '/order/delete/{id}', new CallableRequestHandler(function ($request) {
    $id = $request->getAttribute('id');
    try {
        (new SetData)->deleteOrderById($id);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
    return (new ResponseFactory)->createJsonResponse(200, 'Your order Nr.:' . $id . ' is deleted');
}));

$collector->post('set_user', '/user/set', new CallableRequestHandler(function ($request) {

    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    $response = (new SetData)->setUserWithId($data);

    return (new ResponseFactory)->createJsonResponse(200, $response);
}));

$collector->get('user_info', '/user/{id}', new CallableRequestHandler(function ($request) {

    $id = $request->getAttribute('id');

    try {
        $response = (new GetData)->getUserById($id);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    return (new ResponseFactory)->createJsonResponse(200, $response);

}));


$router = new Router();
$router->addRoute(...$collector->getCollection()->all());
$request = ServerRequestFactory::fromGlobals();
$response = $router->handle($request);
emit($response);
