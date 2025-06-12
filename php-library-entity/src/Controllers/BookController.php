<?php

namespace App\Controllers;

use App\Models\Book;
use JsonRPC\Exception\InvalidParamsException;

class BookController
{
    public function getBooks()
    {
        $bookModel = new Book();
        return $bookModel->getAll();
    }

    public function getBook($params)
    {
        if (!isset($params['id'])) {
            throw new InvalidParamsException('Book ID is required');
        }

        $bookModel = new Book();
        return $bookModel->getById($params['id']);
    }

    public function createBook($params)
    {
        if (!isset($params['title']) || !isset($params['authorId']) || !isset($params['publishedDate'])) {
            throw new InvalidParamsException('Title, Author ID, and Published Date are required');
        }

        $bookModel = new Book();
        return $bookModel->create($params['title'], $params['authorId'], $params['publishedDate']);
    }

    public function updateBook($params)
    {
        if (!isset($params['id']) || !isset($params['title']) || !isset($params['authorId']) || !isset($params['publishedDate'])) {
            throw new InvalidParamsException('ID, Title, Author ID, and Published Date are required');
        }

        $bookModel = new Book();
        return $bookModel->update($params['id'], $params['title'], $params['authorId'], $params['publishedDate']);
    }

    public function deleteBook($params)
    {
        if (!isset($params['id'])) {
            throw new InvalidParamsException('Book ID is required');
        }

        $bookModel = new Book();
        return $bookModel->delete($params['id']);
    }
}