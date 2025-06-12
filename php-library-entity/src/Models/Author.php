<?php

class Author {
    private $id;
    private $name;
    private $biography;

    public function __construct($id, $name, $biography) {
        $this->id = $id;
        $this->name = $name;
        $this->biography = $biography;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBiography() {
        return $this->biography;
    }

    public static function all($db) {
        $stmt = $db->query("SELECT * FROM authors");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function find($db, $id) {
        $stmt = $db->prepare("SELECT * FROM authors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(self::class);
    }

    public function save($db) {
        if ($this->id) {
            $stmt = $db->prepare("UPDATE authors SET name = :name, biography = :biography WHERE id = :id");
            $stmt->execute(['name' => $this->name, 'biography' => $this->biography, 'id' => $this->id]);
        } else {
            $stmt = $db->prepare("INSERT INTO authors (name, biography) VALUES (:name, :biography)");
            $stmt->execute(['name' => $this->name, 'biography' => $this->biography]);
            $this->id = $db->lastInsertId();
        }
    }

    public function delete($db) {
        $stmt = $db->prepare("DELETE FROM authors WHERE id = :id");
        $stmt->execute(['id' => $this->id]);
    }
}