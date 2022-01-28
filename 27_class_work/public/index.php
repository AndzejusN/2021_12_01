<?php

define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH . '/vendor/autoload.php';


use App\Classes\Controllers\BooksController;
use Sunrise\Http\Message\ResponseFactory;
use Sunrise\Http\Router\RequestHandler\CallableRequestHandler;
use Sunrise\Http\Router\RouteCollector;
use Sunrise\Http\Router\Router;
use Sunrise\Http\ServerRequest\ServerRequestFactory;
use function Sunrise\Http\Router\emit;

(Dotenv\Dotenv::createImmutable(ROOT_PATH))->load();

$collector = new RouteCollector();

$collector->get('root', '/', new CallableRequestHandler(function ($request) {
    $response = (new BooksController)->checkData();
    return (new ResponseFactory)->createJsonResponse(200, $response, JSON_PRETTY_PRINT);
}));

$collector->get('all_books', '/books', new CallableRequestHandler(function ($request) {
    $books = (new BooksController)->getAllBooks();
    return (new ResponseFactory)->createJsonResponse(200, $books, JSON_PRETTY_PRINT);
}));

$collector->post('add_book', '/books', new CallableRequestHandler(function ($request) {
    $data = file_get_contents('php://input');
    (new BooksController)->addBook($data);
    return (new ResponseFactory)->createJsonResponse(200, ['book' => 'was added'], JSON_PRETTY_PRINT);
}));

$collector->patch('book_change', '/books/book', new CallableRequestHandler(function ($request) {
    $query = file_get_contents('php://input');
    (new BooksController)->changeBookData($query);
    return (new ResponseFactory)->createJsonResponse(200, ['book' => 'was updated'], JSON_PRETTY_PRINT);
}));

$collector->delete('book_delete', '/books/book', new CallableRequestHandler(function ($request) {
    $query = file_get_contents('php://input');
    (new BooksController)->deleteBook($query);
    return (new ResponseFactory)->createJsonResponse(200, ['book' => 'was deleted'], JSON_PRETTY_PRINT);
}));

$router = new Router();
$router->addRoute(...$collector->getCollection()->all());
$request = ServerRequestFactory::fromGlobals();
$response = $router->handle($request);
emit($response);