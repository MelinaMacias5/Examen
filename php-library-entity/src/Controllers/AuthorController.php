<?php

namespace App\Controllers;

use App\Models\Author;
use JsonRPC\Exception\InvalidParamsException;

class AuthorController
{
    public function getAuthors()
    {
        $authorModel = new Author();
        return $authorModel->getAll();
    }

    public function getAuthor($params)
    {
        if (!isset($params['id'])) {
            throw new InvalidParamsException('Author ID is required');
        }

        $authorModel = new Author();
        return $authorModel->getById($params['id']);
    }

    public function createAuthor($params)
    {
        if (!isset($params['name']) || !isset($params['biography'])) {
            throw new InvalidParamsException('Name and biography are required');
        }

        $authorModel = new Author();
        return $authorModel->create($params['name'], $params['biography']);
    }

    public function updateAuthor($params)
    {
        if (!isset($params['id']) || !isset($params['name']) || !isset($params['biography'])) {
            throw new InvalidParamsException('ID, name, and biography are required');
        }

        $authorModel = new Author();
        return $authorModel->update($params['id'], $params['name'], $params['biography']);
    }

    public function deleteAuthor($params)
    {
        if (!isset($params['id'])) {
            throw new InvalidParamsException('Author ID is required');
        }

        $authorModel = new Author();
        return $authorModel->delete($params['id']);
    }
}