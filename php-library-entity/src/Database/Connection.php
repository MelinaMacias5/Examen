<?php

class Connection
{
    private $connection;

    private function __construct()
    {
        $host = getenv('DB_HOST') ?: 'localhost';
        $db = getenv('DB_NAME') ?: 'postgres';
        $user = getenv('DB_USER') ?: 'clases';
        $pass = getenv('DB_PASS') ?: '123456';
        $port = getenv('DB_PORT') ?: 5432;
        $charset = 'utf8';

        $dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->connection = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new self();
        }
        return $instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}