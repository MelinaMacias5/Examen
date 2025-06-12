<?php

namespace App\Models;

use PDO;

class Book
{
    private $id;
    private $title;
    private $authorId;
    private $publishedDate;

    public function __construct($title, $authorId, $publishedDate, $id = null)
    {
        $this->title = $title;
        $this->authorId = $authorId;
        $this->publishedDate = $publishedDate;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    public static function all(PDO $pdo)
    {
        $stmt = $pdo->query("SELECT * FROM books");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function find(PDO $pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(self::class);
    }

    public function save(PDO $pdo)
    {
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE books SET title = :title, authorId = :authorId, publishedDate = :publishedDate WHERE id = :id");
            $stmt->execute([
                'title' => $this->title,
                'authorId' => $this->authorId,
                'publishedDate' => $this->publishedDate,
                'id' => $this->id
            ]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO books (title, authorId, publishedDate) VALUES (:title, :authorId, :publishedDate)");
            $stmt->execute([
                'title' => $this->title,
                'authorId' => $this->authorId,
                'publishedDate' => $this->publishedDate
            ]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public static function delete(PDO $pdo, $id)
    {
        $stmt = $pdo->prepare("DELETE FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}