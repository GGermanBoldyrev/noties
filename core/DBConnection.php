<?php

namespace app\core;

use PDO;

class DBConnection
{
    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    private string $charset = 'utf8';
    // PDO instance
    private PDO $pdo;

    // TODO: брать connect из .env файла
    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'test';
        $this->user = 'root';
        $this->password = '';

        // New PDO connection setup
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        // Create PDO instance
        $this->pdo = new PDO($dsn, $this->user, $this->password, $opt);
    }

    // Returs all results from query
    public function getAll($queryName) {
        $this->pdo->query("SELECT * FROM $queryName");
    }
}