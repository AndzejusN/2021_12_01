<?php

define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH . '/vendor/autoload.php';
require_once ROOT_PATH . '/base.php';

use App\Classes\Controllers\BooksController;
use Sunrise\Http\Message\ResponseFactory;
use Sunrise\Http\Router\RequestHandler\CallableRequestHandler;
use Sunrise\Http\Router\RouteCollector;
use Sunrise\Http\Router\Router;
use Sunrise\Http\ServerRequest\ServerRequestFactory;
use function Sunrise\Http\Router\emit;

(Dotenv\Dotenv::createImmutable(ROOT_PATH))->load();

$collector = new RouteCollector();

$collector->get('all_books', '/', new CallableRequestHandler(function ($request) use ($dbh) {
    $query = "SELECT * FROM Books";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return (new ResponseFactory)->createJsonResponse(200, $users);
}));


$collector->get('all_books', '/books', new CallableRequestHandler(function ($request) use ($dbh) {
    $query = "SELECT * FROM Books";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return (new ResponseFactory)->createJsonResponse(200, $users);
}));

$collector->post('books_get', '/books', new CallableRequestHandler(function ($request) use ($dbh) {
    $query = file_get_contents('php://input');
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    return (new ResponseFactory)->createJsonResponse(200, [
        'status' => 'ok'
    ]);
}));

$collector->patch('book_change', '/books/book', new CallableRequestHandler(function ($request) use ($dbh) {
    $query = file_get_contents('php://input');
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    return (new ResponseFactory)->createJsonResponse(200, [
        'status' => 'ok'
    ]);
}));

$collector->delete('book_delete', '/books/book', new CallableRequestHandler(function ($request) use ($dbh) {
    $query = file_get_contents('php://input');
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    return (new ResponseFactory)->createJsonResponse(200, [
        'status' => 'ok'
    ]);
}));

$router = new Router();
$router->addRoute(...$collector->getCollection()->all());
$request = ServerRequestFactory::fromGlobals();
$response = $router->handle($request);
emit($response);


// INSERT INTO Books (id, author, name, year, genre)
// VALUES (NULL, 'From Postman', 'Skagen 21', 2000, 'Tragedy')

// UPDATE Books SET author='Update', name='Update' WHERE id=1

// DELETE FROM Books WHERE id=2
