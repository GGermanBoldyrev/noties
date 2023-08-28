<?php

namespace app\core;

use PDO;

class DB
{
    // PDO instance
    private PDO $db;

    // TODO: брать connect из .env файла
    public function __construct()
    {
        // Database configuration parameters
        $dbconfig = require_once '../db.config.php';

        // New PDO connection settings
        $dsn = 'mysql:host=' . $dbconfig['HOST'] . ';dbname=' . $dbconfig['DBNAME'] . ';charset=' . $dbconfig['CHARSET'];
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        // Create PDO instance
        $this->db = new PDO($dsn, $dbconfig['USERNAME'], $dbconfig['PASSWORD'], $opt);
    }

    // Returns all results from query as an array[]
    public function getAll($queryName): array
    {
        $sql = "SELECT * FROM $queryName";
        $query = $this->pdo->query($sql);
        return $query->fetchAll();
    }
}
