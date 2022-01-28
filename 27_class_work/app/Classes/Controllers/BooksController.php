<?php

namespace App\Classes\Controllers;

use App\Classes\Helper;
use PDO;


class BooksController
{

    public function getAllBooks()
    {
        $dbh = Helper::databaseConnection();
        $query = "SELECT * FROM Books";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBook($data)
    {
        $dbh = Helper::databaseConnection();
        $data = json_decode($data, true);
        $query = 'INSERT INTO books (id, author, name, year, genre)
        VALUES (:id,:author,:name,:year,:genre);';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['id' => NULL, 'author' => "{$data['author']}", 'name' => "{$data['name']}", 'year' => "{$data['year']}", 'genre' => "{$data['genre']}"]);
    }

    public function changeBookData($data)
    {
        $dbh = Helper::databaseConnection();
        $data = json_decode($data, true);
        $query = 'UPDATE books SET author = :author, name = :name, year = :year, genre = :genre WHERE id = :id;';

        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['id' => "{$data['id']}", 'author' => "{$data['author']}", 'name' => "{$data['name']}", 'year' => "{$data['year']}", 'genre' => "{$data['genre']}"]);
    }

    public function deleteBook($data)
    {
        $dbh = Helper::databaseConnection();
        $data = json_decode($data, true);
        $query = 'DELETE FROM books WHERE id = :id;';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['id' => "{$data['id']}"]);
    }

    public function checkData()
    {
        return Helper::fileAccessibility();
    }
    
}