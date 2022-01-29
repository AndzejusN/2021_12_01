<?php

namespace App\Classes\Controllers;

use App\Classes\Helper;
use PDO;
use PDOException;

class BooksController
{
    private PDO $dbh;

    public function __construct()
    {
        $host = getenv('MYSQL_HOST');
        $database = getenv('MYSQL_DATABASE');
        $username = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');
        $this->dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }


    public function getAllBooks()
    {
        $query = "SELECT * FROM Books";
        $stmt = ($this->dbh)->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBook($data)
    {
        $data = json_decode($data, true);

        $query = 'INSERT INTO books (id, author, name, year, genre)
                            VALUES (:id,:author,:name,:year,:genre);';
        $sth = $this->dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

        try {
            $sth->execute(['id' => NULL, 'author' => "{$data['author']}",
                'name' => "{$data['name']}", 'year' => "{$data['year']}", 'genre' => "{$data['genre']}"]);
        } catch (PDOException $e) {
            return ['mistake' => $e->getMessage()];
        }

        $last = $this->dbh->lastInsertId();

        return ['book' => 'was added', 'id' => $last];
    }

    public function changeBookData($data, $id)
    {
        $data = json_decode($data, true);

        $book = $this->getBookById($id);

        if (!$book) {
            return ['Book' => 'not found', 'Not correct id' => $id];
        }

        try {
            $this->updateBook($data, $id);
            $updatedBook = $this->getBookById($id);

            $result = ['Book' => 'was updated', 'Book information' => $updatedBook];

        } catch (PDOException $e) {

            $result = ['Error message' => $e->getMessage()];
        }

        return $result;
    }

    public function updateBook($data, $id)
    {

        $query = 'UPDATE books SET author = :author, name = :name, year = :year, genre = :genre WHERE id = :id;';
        $sth = $this->dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['id' => $id, 'author' => $data['author'], 'name' => $data['name'], 'year' => $data['year'], 'genre' => $data['genre']]);

    }

    public function deleteBook($id)
    {
        $book = $this->getBookById($id);

        if (!$book) {
            return ['Book' => 'not found', 'Please check' => 'id'];
        }

        try {
            $this->deleteBookById($id);
            $result = ['Book' => 'was deleted', 'Book information' => $book];
        } catch (PDOException $e) {
            $result = ['Error message' => $e->getMessage()];
        }

        return $result;
    }

    public function deleteBookById($id)
    {
        $query = 'DELETE FROM books WHERE id = :id;';
        $sth = $this->dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['id' => $id]);
    }


    public function getBookById($id)
    {
        $bookInfo = 'SELECT * FROM books WHERE id = :id;';
        $sth = $this->dbh->prepare($bookInfo, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['id' => $id]);

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function checkData()
    {
        return Helper::fileAccessibility();
    }

}